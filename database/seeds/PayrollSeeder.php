<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->seedPayrollStatuses();
        $this->seedPayslipStatuses();
        $this->seedEarningTypes();
        $this->seedDeductionTypes();
    }

    private function seedPayrollStatuses()
    {
        $data = config('open-payroll.seeds.payroll_statuses');

        foreach ($data as $datum) {
            config('open-payroll.models.payroll_statuses')::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedPayslipStatuses()
    {
        $data = config('open-payroll.seeds.payslip_statuses');

        foreach ($data as $datum) {
            config('open-payroll.models.payslip_statuses')::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedDeductionTypes()
    {
        $data = config('open-payroll.seeds.deduction_types');

        foreach ($data as $datum) {
            config('open-payroll.models.deduction_types')::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedEarningTypes()
    {
        $data = config('open-payroll.seeds.earning_types');

        foreach ($data as $datum) {
            config('open-payroll.models.earning_types')::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }
}
