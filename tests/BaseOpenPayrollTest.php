<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

class BaseOpenPayrollTest extends TestCase
{
    /** @test */
    public function it_has_config_file()
    {
        $this->assertHasConfig('open-payroll');
    }

    /** @test */
    public function it_has_payroll_helper()
    {
        $this->assertHasHelper('payroll');
    }

    /** @test */
    public function it_has_payslip_helper()
    {
        $this->assertHasHelper('payslip');
    }

    /** @test */
    public function it_has_payroll_processor()
    {
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Processors\PayrollProcessor::class);
    }

    /** @test */
    public function it_has_payslip_processor()
    {
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Processors\PayslipProcessor::class);
    }

    /** @test */
    public function it_has_model()
    {
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Payroll\Payroll::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Payroll\Status::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Payslip\Payslip::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Payslip\Status::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Deduction\Type::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Earning\Earning::class);
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Models\Earning\Type::class);
    }

    /** @test */
    public function it_has_users_table()
    {
        $this->assertHasTable('users');
    }

    /** @test */
    public function it_has_references_tables()
    {
        $this->assertHasTable('payroll_statuses');
        $this->assertHasTable('payslip_statuses');
        $this->assertHasTable('earning_types');
        $this->assertHasTable('deduction_types');
    }

    /** @test */
    public function it_has_references_tables_data()
    {
        $this->assertHasTable('payroll_statuses');
        $this->assertHasTable('payslip_statuses');
        $this->assertHasTable('earning_types');
        $this->assertHasTable('deduction_types');
    }

    /** @test */
    public function it_has_open_payroll_tables()
    {
        $this->assertHasTable('payrolls');
        $this->assertHasTable('payslips');
        $this->assertHasTable('earnings');
        $this->assertHasTable('deductions');
    }

    /** @test */
    public function it_has_published_migrations()
    {
        $this->assertHasMigration('CreatePayrollTable');
    }

    /** @test */
    public function it_has_published_seeders()
    {
        $this->assertHasClass('OpenPayrollSeeder');
    }
}
