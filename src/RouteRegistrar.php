<?php

namespace CleaniqueCoders\OpenPayroll;

use Illuminate\Contracts\Routing\Registrar as Router;
use Illuminate\Support\Facades\Route;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes.
     */
    public function all()
    {
        $this->router->group(['middleware' => ['web', 'auth']], function($router) {
            $router->resource('payroll', 'PayrollController');
            $router->resource('payslip', 'PayslipController');
            $router->resource('earning', 'EarningController');
            $router->resource('deduction', 'DeductionController');
            $router->get('recalculate/payslip/{id}', 'RecalculatePayslipController@__invoke')->name('payslip.recalculate');
            $router->get('recalculate/payroll/{id}', 'RecalculatePayrollController@__invoke')->name('payroll.recalculate');

            $router->get('setting', 'SettingController@__invoke')->name('setting.index');

            $this->router->group([
                    'namespace' => 'Setting',
                    'prefix'    => 'setting',
                    'as'        => 'setting.',
                ], function($router) {
                    $router->resource('deduction', 'DeductionController');
                    $router->resource('earning', 'EarningController');
                });
        });
    }
}
