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
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'OpenPayroll';
    }
}
