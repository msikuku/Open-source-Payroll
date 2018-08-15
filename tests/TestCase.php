<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use CleaniqueCoders\OpenPayroll\Tests\Traits\TestCaseTrait;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use TestCaseTrait;

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
}
