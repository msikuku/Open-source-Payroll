<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use Illuminate\Support\Str;

trait EarningTrait
{
    public $payslip;

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
}
