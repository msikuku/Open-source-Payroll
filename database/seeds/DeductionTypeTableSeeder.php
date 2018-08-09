<?php

use CleaniqueCoders\OpenPayroll\Models\Payroll\Type\Deduction as DeductionType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DeductionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = config('payroll.deduction_types');

        foreach ($data as $datum) {
            DeductionType::create([
                'name' => $datum,
                'code' => Str::kebab($datum),
            ]);
        }
    }
}
