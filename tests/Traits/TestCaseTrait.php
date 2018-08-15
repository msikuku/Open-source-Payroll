<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

trait TestCaseTrait
{
    use SeedTrait;

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

    /**
     * Do clean up on tear down.
     */
    protected function tearDown()
    {
        $this->cleanUp();
        parent::tearDown();
    }

    /**
     * Run all migrations.
     */
    public function migrate()
    {
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench']);
    }

    /**
     * Do test clean up.
     */
    public function cleanUp()
    {
        $this->removeMigrationFiles();
        $this->removeSeederFiles();
        $this->removeIfExist(config_path('payroll.php'));
    }

    /**
     * Clear all caches.
     */
    public function clearCaches()
    {
        $this->artisan('config:clear');
    }

    /**
     * Republish assets.
     */
    public function republish()
    {
        $this->cleanUp();
        $this->clearCaches();
        $this->publish();
        $this->clearCaches();
    }

    /**
     * Remove all migration files if exist.
     */
    public function removeMigrationFiles()
    {
        if (class_exists('CreatePayrollTable')) {
            collect(glob(database_path('migrations/*.php')))
                ->each(function ($path) {
                    $this->removeIfExist($path);
                });
        }
    }

    /**
     * Remove all seed files if exist.
     */
    public function removeSeederFiles()
    {
        if (class_exists('PayrollTestSeeder') || class_exists('PayrollSeeder')) {
            collect(glob(database_path('seeds/*.php')))
                ->each(function ($path) {
                    $this->removeIfExist($path);
                });
        }
    }

    /**
     * Remove file if exists.
     *
     * @param string $path
     */
    public function removeIfExist($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }

    /**
     * Publish all package assets.
     */
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
     * Truncate table.
     */
    public function truncateTable($table)
    {
        \DB::table($table)->truncate();
    }
}
