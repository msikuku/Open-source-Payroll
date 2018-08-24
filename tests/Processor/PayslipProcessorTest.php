<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Processor;

use CleaniqueCoders\OpenPayroll\Tests\TestCase;
use CleaniqueCoders\OpenPayroll\Tests\Traits\PayrollTrait;

class PayslipProcessor extends TestCase
{
    use PayrollTrait;

    public function setUp()
    {
        parent::setUp();
        $this->seedUsers();
        $this->seedOnePayrollData();
        $this->seedOnePayslipData();
        $this->seedEarningData();
        $this->seedDeductionData();
    }

    /** @test */
    public function it_has_payroll_data()
    {
        $this->assertTrue(config('open-payroll.models.payroll')::count() > 0);
    }

    /** @test */
    public function it_has_payslip_data()
    {
        $this->assertTrue(config('open-payroll.models.payslip')::count() > 0);
    }

    /** @test */
    public function it_has_earning_data()
    {
        $this->assertTrue(config('open-payroll.models.earning')::count() > 0);
    }

    /** @test */
    public function it_has_deduction_data()
    {
        $this->assertTrue(config('open-payroll.models.deduction')::count() > 0);
    }
}
