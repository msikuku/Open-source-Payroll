<?php

use CleaniqueCoders\OpenPayroll\Models\Payroll\Type\Earning as EarningType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EarningTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = config('payroll.earning_types');

        foreach ($data as $datum) {
            EarningType::create([
                'name' => $datum,
                'code' => Str::kebab($datum),
            ]);
        }
    }
}
