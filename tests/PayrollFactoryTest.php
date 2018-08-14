<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class PayrollFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->seedPayrollSeeder();
        $this->reseedUsers();
    }

    /** @test */
    public function it_has_seeders()
    {
        $this->assertHasClass('PayrollSeeder');
        $this->assertHasClass('PayrollTestSeeder');
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
        $user = \DB::table('users')->first();

        \DB::table('payrolls')->insert([
            'user_id' => $user->id,
            'month'   => 1,
            'year'    => 2018,
            'date'    => '2018-08-1',
        ]);

        $this->assertDatabaseHas('payrolls', [
            'user_id' => $user->id,
            'month'   => 1,
            'year'    => 2018,
            'date'    => '2018-08-1',
        ]);

        \DB::table('payrolls')->truncate();
    }
}
