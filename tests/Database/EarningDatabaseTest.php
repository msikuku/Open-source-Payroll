<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Database;

use CleaniqueCoders\OpenPayroll\Tests\TestCase;
use CleaniqueCoders\OpenPayroll\Tests\Traits\PayrollTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class EarningDatabaseTest extends TestCase
{
    use PayrollTrait, RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->seedPayrollSeeder();
        $this->reseedUsers();
        $this->seedOnePayrollData();
        $this->seedOnePayslipData();
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

        foreach ($earning_types as $type) {
            $this->seedDatum([
                'user_id'         => $payslip->user_id,
                'payroll_id'      => $payslip->payroll_id,
                'payslip_id'      => $payslip->id,
                'earning_type_id' => $type->id,
                'name'            => $type->name,
                'description'     => 'Earning for ' . $type->name,
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
                'description'     => 'Earning for ' . $type->name,
                'amount'          => 10000,
            ]);
        }
    }
}
