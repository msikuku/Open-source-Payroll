<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Earning\Type as EarningType;

trait EarningTrait
{
    public $earning_types;

    public function getAllEarningTypes()
    {
        return $this->earning_types = EarningType::all();
    }

    public function seedEarningData()
    {
        $this->getAllEarningTypes();
        $this->getAUser();
        $this->getAPayslip();
        foreach ($this->earning_types as $type) {
            $this->seedDatum([
                'user_id'         => $this->payslip->user_id,
                'payroll_id'      => $this->payslip->payroll_id,
                'payslip_id'      => $this->payslip->id,
                'earning_type_id' => $type->id,
                'name'            => $type->name,
                'description'     => $type->description,
                'amount'          => 100000,
            ], \CleaniqueCoders\OpenPayroll\Models\Earning\Earning::class);
        }
    }
}
