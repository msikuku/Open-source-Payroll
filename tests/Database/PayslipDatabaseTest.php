<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Database;

use CleaniqueCoders\OpenPayroll\Tests\TestCase;
use CleaniqueCoders\OpenPayroll\Tests\Traits\PayrollTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PayslipDatabaseTest extends TestCase
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
    public function it_can_insert_payslip_data()
    {
        $this->seedOnePayslipData();
        $this->assertHasOnePayslipData();
    }
}
