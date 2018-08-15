<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Earning\Earning;
use CleaniqueCoders\OpenPayroll\Models\Earning\Type as EarningType;
use Illuminate\Support\Str;

trait EarningTrait
{
    public $payslip;
    public $earning_types;

    public function getAllEarningTypes()
    {
        return $this->earning_types = EarningType::all();
    }

    /** @test */
    public function it_has_earning_type_table()
    {
        $this->assertHasTable('earning_types');
    }

    /** @test */
    public function it_has_earning_type_data()
    {
        $earning_types = config('open-payroll.seeds.earning_types');

        foreach ($earning_types as $type) {
            $this->assertDatabaseHas('earning_types', [
                'name'      => $type,
                'code'      => Str::kebab($type),
                'is_locked' => true,
            ]);
        }
    }

    /** @test */
    public function it_can_insert_earning_data()
    {
        $earning_types = $this->getAllEarningTypes();

        $payslip = $this->getAPayslip();
        $payroll = $payslip->payroll;

        foreach ($earning_types as $type) {
            $this->seedDatum([
                'user_id'         => $payslip->user_id,
                'payroll_id'      => $payslip->payroll_id,
                'payslip_id'      => $payslip->id,
                'earning_type_id' => $type->id,
                'name'            => $type->name,
                'description'     => 'Earning for ' . $type->name . ' - ' . $payroll->month . '/' . $payroll->year,
                'amount'          => 10000,
            ], \CleaniqueCoders\OpenPayroll\Models\Earning\Earning::class);
        }

        foreach ($earning_types as $type) {
            $this->assertDatabaseHas('earnings', [
                'user_id'         => $payslip->user_id,
                'payroll_id'      => $payslip->payroll_id,
                'payslip_id'      => $payslip->id,
                'earning_type_id' => $type->id,
                'name'            => $type->name,
                'description'     => 'Earning for ' . $type->name . ' - ' . $payroll->month . '/' . $payroll->year,
                'amount'          => 10000,
            ]);
        }
    }
}
