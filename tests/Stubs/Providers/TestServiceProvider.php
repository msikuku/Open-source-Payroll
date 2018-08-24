<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Stubs\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        \CleaniqueCoders\OpenPayroll\OpenPayroll::routes();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
