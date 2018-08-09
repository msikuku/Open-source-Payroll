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
            __DIR__ . '/../config/payroll.php' => config_path('payroll.php'),
        ], 'config');

        /*
         * Migration
         */
        if (! class_exists('CreatePayrollTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_payroll_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_payroll_table.php'),
            ], 'migrations');
        }

        /*
         * Seeders
         */
        if (! class_exists('EarningTypeTableSeeder')) {
            $this->publishes([
                __DIR__ . '/../database/seeds/EarningTypeTableSeeder.php' => database_path('seeds/EarningTypeTableSeeder.php'),
            ], 'seeders');
        }

        if (! class_exists('DeductionTypeTableSeeder')) {
            $this->publishes([
                __DIR__ . '/../database/seeds/DeductionTypeTableSeeder.php' => database_path('seeds/DeductionTypeTableSeeder.php'),
            ], 'seeders');
        }

        /*
         * Views
         */
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/payroll'),
        ], 'views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'payroll');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
