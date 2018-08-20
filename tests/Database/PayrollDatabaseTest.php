<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Database;

use CleaniqueCoders\OpenPayroll\Tests\TestCase;
use CleaniqueCoders\OpenPayroll\Tests\Traits\PayrollTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class PayrollDatabaseTest extends TestCase
{
    use PayrollTrait, RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->seedPayrollSeeder();
        $this->reseedUsers();
        $this->seedOnePayrollData();
    }

    /** @test */
    public function it_has_seeders()
    {
        $this->assertHasClass('OpenPayrollSeeder');
        $this->assertHasClass('OpenPayrollDemoSeeder');
    }

    /** @test */
    public function it_has_references_data()
    {
        $tables = config('open-payroll.tables.names');

        foreach ($tables as $table) {
            $this->assertHasTable($table);
        }

        $seeds = config('open-payroll.seeds');

        foreach ($seeds as $table => $data) {
            foreach ($data as $datum) {
                $this->assertDatabaseHas($table, [
                    'name' => $datum,
                    'code' => Str::kebab($datum),
                ]);
            }
        }
    }

    /** @test */
    public function it_can_insert_payroll_data()
    {
        $this->seedOnePayrollData();
        $this->assertHasOnePayrollData();
        $this->truncateTable($this->payroll->getTable());
    }
}
