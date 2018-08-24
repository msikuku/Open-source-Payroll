<?php

namespace CleaniqueCoders\OpenPayroll;

/*
 * This file is part of open-payroll
 *
 * @license MIT
 * @package open-payroll
 */

use Illuminate\Support\Facades\Facade;

class OpenPayrollFacade extends Facade
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

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'OpenPayroll';
    }
}
