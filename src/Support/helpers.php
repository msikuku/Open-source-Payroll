<?php

if (! function_exists('payroll')) {
    function payroll()
    {
        return \CleaniqueCoders\OpenPayroll\Processors\PayrollProcessor::make();
    }
}
