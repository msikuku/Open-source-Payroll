<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

class PayrollTest extends TestCase
{
    /** @test */
    public function it_has_config_file()
    {
        $this->assertHasConfig('open-payroll');
    }

    /** @test */
    public function it_has_helper()
    {
        $this->assertHasHelper('payroll');
    }

    /** @test */
    public function it_has_payroll_processor()
    {
        $this->assertHasClass(\CleaniqueCoders\OpenPayroll\Processors\PayrollProcessor::class);
    }

    /** @test */
    public function it_has_users_table()
    {
        $this->assertHasTable('users');
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
    public function it_has_openpayroll_tables()
    {
        $this->assertHasMigration('CreatePayrollTable');

        $tables = config('open-payroll.tables.names');
        foreach ($tables as $table) {
            $this->assertHasTable($table);
        }
    }
}
