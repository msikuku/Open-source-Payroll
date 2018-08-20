<?php

if (! function_exists('payroll')) {
    function payroll($identifier)
    {
        return \CleaniqueCoders\OpenPayroll\Processors\PayrollProcessor::make($identifier);
    }
}

if (! function_exists('payslip')) {
    function payslip($identifier)
    {
        return \CleaniqueCoders\OpenPayroll\Processors\PayslipProcessor::make($identifier);
    }
}
