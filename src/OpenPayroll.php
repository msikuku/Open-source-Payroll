<?php

namespace CleaniqueCoders\OpenPayroll;

use Illuminate\Support\Facades\Route;

class OpenPayroll
{
    /**
     * Binds the Passport routes into the controller.
     *
     * @param callable|null $callback
     * @param array         $options
     */
    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ?: function($router) {
            $router->all();
        };
        $defaultOptions = [
            'prefix'    => 'OpenPayroll',
            'as'        => 'open-payroll.',
            'namespace' => '\CleaniqueCoders\OpenPayroll\Http\Controllers',
        ];
        $options = array_merge($defaultOptions, $options);
        Route::group($options, function($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
}
