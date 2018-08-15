<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction;
use CleaniqueCoders\OpenPayroll\Models\Deduction\Type as DeductionType;
use Illuminate\Support\Str;

trait DeductionTrait
{
    public $payslip;
    public $deduction_types;

    public function getAllDeductionTypes()
    {
        return $this->deduction_types = DeductionType::all();
    }

    /** @test */
    public function it_has_deduction_type_table()
    {
        $this->assertHasTable('deduction_types');
    }

    /** @test */
    public function it_has_deduction_type_data()
    {
        $deduction_types = config('open-payroll.seeds.deduction_types');

        foreach ($deduction_types as $type) {
            $this->assertDatabaseHas('deduction_types', [
                'name'      => $type,
                'code'      => Str::kebab($type),
                'is_locked' => true,
            ]);
        }
    }

    /** @test */
    public function it_can_insert_deduction_data()
    {
        $deduction_types = $this->getAllDeductionTypes();

        $payslip = $this->getAPayslip();
        $payroll = $payslip->payroll;

        foreach ($deduction_types as $type) {
            $this->seedDatum([
                'user_id'           => $payslip->user_id,
                'payroll_id'        => $payslip->payroll_id,
                'payslip_id'        => $payslip->id,
                'deduction_type_id' => $type->id,
                'name'              => $type->name,
                'description'       => 'Deduction for ' . $type->name . ' - ' . $payroll->month . '/' . $payroll->year,
                'amount'            => 10000,
            ], \CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction::class);
        }

        foreach ($deduction_types as $type) {
            $this->assertDatabaseHas('deductions', [
                'user_id'           => $payslip->user_id,
                'payroll_id'        => $payslip->payroll_id,
                'payslip_id'        => $payslip->id,
                'deduction_type_id' => $type->id,
                'name'              => $type->name,
                'description'       => 'Deduction for ' . $type->name . ' - ' . $payroll->month . '/' . $payroll->year,
                'amount'            => 10000,
            ]);
        }
    }
}
