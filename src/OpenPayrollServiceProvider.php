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
        ], 'config');

        /*
         * Migration
         */
        if (! class_exists('CreatePayrollTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_payroll_table.php.stub'  => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_payroll_table.php'),
                __DIR__ . '/../database/migrations/create_positions_table.php.stub'      => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_positions_table.php'),
                __DIR__ . '/../database/migrations/create_salaries_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_salaries_table.php'),
            ], 'migrations');
        }

        /*
         * Seeders
         */
        $this->publishes([
            __DIR__ . '/../database/seeds/' => database_path('seeds/'),
        ], 'seeders');

        /*
         * Views
         */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views'),
        ], 'views');

        /*
         * Models
         */
        $this->publishes([
            __DIR__ . '/../stubs/Models/OpenPayroll' => app_path('Models'),
        ], 'models');

        /*
         * Controllers
         */
        $this->publishes([
            __DIR__ . '/../stubs/Http/Controllers' => app_path('Http/Controllers'),
        ], 'controllers');

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
