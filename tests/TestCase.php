<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use Illuminate\Support\Facades\Schema;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();
        $this->withFactories(realpath(__DIR__ . '/../factories'));
        $this->cleanUp();
        $this->publish();
        $this->clearCaches();
        $this->migrate();
    }

    protected function tearDown()
    {
        $this->cleanUp();
        parent::tearDown();
    }

    public function migrate()
    {
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench']);
    }

    public function seedTest()
    {
        $this->artisan('db:seed', ['--class' => 'PayrollSeeder']);
    }

    /**
     * Seed.
     */
    public function seedUsers()
    {
        $now = \Carbon\Carbon::now();
        \DB::table('users')->insert([
            'name'       => 'OpenPayroll',
            'email'      => 'hello@open-payroll.com',
            'password'   => \Hash::make('456'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        \DB::table('users')->insert([
            'name'       => 'OpenPayroll',
            'email'      => 'hi@open-payroll.com',
            'password'   => \Hash::make('456'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    public function seedPayrollSeeder()
    {
        $this->artisan('db:seed', ['--class' => 'PayrollSeeder']);
    }

    public function truncateUsersTable()
    {
        \DB::table('users')->truncate();
    }

    public function reseedUsers()
    {
        $this->truncateUsersTable();
        $this->seedUsers();
    }

    /** @test */
    public function it_has_users()
    {
        $this->truncateUsersTable();
        $this->seedUsers();

        $user = \DB::table('users')->where('id', '=', 2)->first();
        $this->assertEquals('hi@open-payroll.com', $user->email);
        $this->assertTrue(\Hash::check('456', $user->password));

        $user = \DB::table('users')->where('id', '=', 1)->first();
        $this->assertEquals('hello@open-payroll.com', $user->email);
        $this->assertTrue(\Hash::check('456', $user->password));
    }

    public function cleanUp()
    {
        $this->removeMigrationFiles();
        $this->removeSeederFiles();
        $this->removeIfExist(config_path('payroll.php'));
    }

    public function clearCaches()
    {
        $this->artisan('config:clear');
    }

    public function republish()
    {
        $this->cleanUp();
        $this->clearCaches();
        $this->publish();
        $this->clearCaches();
    }

    public function removeMigrationFiles()
    {
        if (class_exists('CreatePayrollTable')) {
            collect(glob(database_path('migrations/*.php')))
                ->each(function ($path) {
                    $this->removeIfExist($path);
                });
        }
    }

    public function removeSeederFiles()
    {
        if (class_exists('PayrollTestSeeder') || class_exists('PayrollSeeder')) {
            collect(glob(database_path('seeds/*.php')))
                ->each(function ($path) {
                    $this->removeIfExist($path);
                });
        }
    }

    public function removeIfExist($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function publish()
    {
        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-config',
        ]);

        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-migrations',
        ]);

        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-seeders',
        ]);
    }

    /**
     * Load Package Service Provider.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array List of Service Provider
     */
    protected function getPackageProviders($app)
    {
        return [
            \CleaniqueCoders\OpenPayroll\OpenPayrollServiceProvider::class,
            \CleaniqueCoders\LaravelObservers\LaravelObserversServiceProvider::class,
            \CleaniqueCoders\LaravelHelper\LaravelHelperServiceProvider::class,
            \CleaniqueCoders\Blueprint\Macro\BlueprintMacroServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * Assert the current database has table.
     *
     * @param string $table table name
     */
    protected function assertHasTable($table)
    {
        $this->assertTrue(Schema::hasTable($table));
    }

    /**
     * Assert the table has columns defined.
     *
     * @param string $table   table name
     * @param array  $columns list of columns
     */
    protected function assertTableHasColumns($table, $columns)
    {
        collect($columns)->each(function ($column) use ($table) {
            $this->assertTrue(Schema::hasColumn($table, $column));
        });
    }

    /**
     * Assert has helper.
     *
     * @param string $helper helper name
     */
    protected function assertHasHelper($helper)
    {
        $this->assertTrue(function_exists($helper));
    }

    /**
     * Assert has config.
     *
     * @param string $config config name
     */
    protected function assertHasConfig($config)
    {
        $this->assertFileExists(config_path($config . '.php'));
    }

    /**
     * Assert has migration.
     *
     * @param string $migration migration name
     */
    protected function assertHasMigration($migration)
    {
        $this->assertHasClass($migration);
    }

    /**
     * Assert has class.
     *
     * @param string $class class name
     */
    protected function assertHasClass($class)
    {
        $this->assertTrue(class_exists($class));
    }

    /**
     * Assert has class method exist.
     *
     * @param string $object object
     * @param string $method method
     */
    protected function assertHasClassMethod($object, $method)
    {
        $this->assertTrue(method_exists($object, $method));
    }
}
