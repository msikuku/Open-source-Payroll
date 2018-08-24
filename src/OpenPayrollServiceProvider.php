<?php

namespace CleaniqueCoders\OpenPayroll;

use Illuminate\Support\ServiceProvider;

class OpenPayrollServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Configuration
         */
        $this->publishes([
            __DIR__ . '/../config/open-payroll.php' => config_path('open-payroll.php'),
        ], 'open-payroll-config');

        /*
         * Database - Migrations, Factories and Seeders
         */
        if (! class_exists('CreatePayrollTable')) {
            $this->publishes([
                __DIR__ . '/../database/factories/'                                 => database_path('factories/'),
                __DIR__ . '/../database/migrations/create_payroll_table.php.stub'   => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_payroll_table.php'),
                __DIR__ . '/../database/migrations/create_positions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_positions_table.php'),
                __DIR__ . '/../database/migrations/create_salaries_table.php.stub'  => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_salaries_table.php'),
            ], 'open-payroll-database');
        }

        /*
         * Views
         */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views'),
        ], 'open-payroll-views');

        /*
         * Models & Controllers
         */
        $this->publishes([
            __DIR__ . '/../stubs/Models'           => app_path('Models'),
            __DIR__ . '/../stubs/Http/Controllers' => app_path('Http/Controllers'),
        ], 'open-payroll-app');

        /*
         * Commands
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\InstallCommand::class,
                Console\Commands\SeedOpenPayrollReferenceCommand::class,
                Console\Commands\SeedDemoDataCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
             __DIR__ . '/../config/open-payroll.php', 'open-payroll'
        );
    }
}
