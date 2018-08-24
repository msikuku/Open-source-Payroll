<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Deduction\Type as DeductionType;

trait DeductionTrait
{
    public $deduction_types;

    public function getAllDeductionTypes()
    {
        return $this->deduction_types = DeductionType::all();
    }

    public function seedDeductionData()
    {
        $this->getAllDeductionTypes();
        $this->getAUser();
        $this->getAPayslip();
        foreach ($this->deduction_types as $type) {
            $this->seedDatum([
                'user_id'           => $this->payslip->user_id,
                'payroll_id'        => $this->payslip->payroll_id,
                'payslip_id'        => $this->payslip->id,
                'deduction_type_id' => $type->id,
                'name'              => $type->name,
                'description'       => $type->description,
                'amount'            => 100000,
            ], \CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction::class);
        }
    }
}
