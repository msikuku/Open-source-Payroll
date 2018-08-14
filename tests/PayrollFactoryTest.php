<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class PayrollFactoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_seeders()
    {
        $this->assertHasClass('PayrollSeeder');
        $this->assertHasClass('PayrollTestSeeder');
    }

    /** @test */
    public function it_has_references_data()
    {
        $this->artisan('db:seed', ['--class' => 'PayrollSeeder']);
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
}
