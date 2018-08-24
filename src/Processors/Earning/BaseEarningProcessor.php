<?php

namespace CleaniqueCoders\OpenPayroll\Processors\Earning;

use CleaniqueCoders\OpenPayroll\Contracts\CalculateContract;
use CleaniqueCoders\OpenPayroll\Traits\MakeInstance;

class BaseEarningProcessor implements CalculateContract
{
    use MakeInstance;

    public function getModel()
    {
        return config('open-payroll.models.earning');
    }

    public function earning($earning)
    {
        return $this->instance($earning);
    }

    public function calculate()
    {
    }
}
