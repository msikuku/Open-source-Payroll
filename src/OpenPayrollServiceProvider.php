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
         * Migration
         */
        if (! class_exists('CreatePayrollTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_payroll_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_payroll_table.php'),
            ], 'open-payroll-migrations');
        }

        /*
         * Seeders
         */
        if (! class_exists('PayrollSeeder')) {
            $this->publishes([
                __DIR__ . '/../database/seeds/PayrollSeeder.php' => database_path('seeds/PayrollSeeder.php'),
            ], 'open-payroll-seeders');
        }

        if (! class_exists('PayrollTestSeeder')) {
            $this->publishes([
                __DIR__ . '/../database/seeds/PayrollTestSeeder.php' => database_path('seeds/PayrollTestSeeder.php'),
            ], 'open-payroll-seeders');
        }

        /*
         * Views
         */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views'),
        ], 'open-payroll-views');
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
