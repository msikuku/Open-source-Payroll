<?php

if (! function_exists('payroll')) {
    function payroll($hashslug = null)
    {
        return \CleaniqueCoders\OpenPayroll\Processors\PayrollProcessor::make($hashslug);
    }
}
