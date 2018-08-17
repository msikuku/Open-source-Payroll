<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Earning\Type as EarningType;

trait EarningTrait
{
    public $payslip;
    public $earning_types;

    public function getAllEarningTypes()
    {
        return $this->earning_types = EarningType::all();
    }
}
