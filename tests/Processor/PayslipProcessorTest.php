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
    }

    /** @test */
    public function it_has_payroll_date()
    {
    	$this->assertTrue(config('open-payroll.models.payroll')::count() > 0);
    }

    /** @test */
    public function it_has_payslip_date()
    {
    	$this->assertTrue(config('open-payroll.models.payslip')::count() > 0);
    }

    /**
     * @todo seed data, then assert
     */
    public function it_has_earning_date()
    {
    	$this->assertTrue(config('open-payroll.models.earning')::count() > 0);
    }

    /**
     * @todo seed data, then assert
     */
    public function it_has_deduction_date()
    {
    	$this->assertTrue(config('open-payroll.models.deduction')::count() > 0);
    }
}