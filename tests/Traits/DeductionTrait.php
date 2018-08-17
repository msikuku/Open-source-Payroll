<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Deduction\Type as DeductionType;

trait DeductionTrait
{
    public $payslip;
    public $deduction_types;

    public function getAllDeductionTypes()
    {
        return $this->deduction_types = DeductionType::all();
    }
}
