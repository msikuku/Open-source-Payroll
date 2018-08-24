<?php

namespace CleaniqueCoders\OpenPayroll\Processors\Deduction;

use CleaniqueCoders\OpenPayroll\Contracts\CalculateContract;
use CleaniqueCoders\OpenPayroll\Traits\MakeInstance;

class BaseDeductionProcessor implements CalculateContract
{
    use MakeInstance;

    public function getModel()
    {
        return config('open-payroll.models.deduction');
    }

    public function deduction($deduction)
    {
        return $this->instance($deduction);
    }

    public function calculate()
    {
    }
}
