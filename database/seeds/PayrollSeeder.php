<?php

use CleaniqueCoders\OpenPayroll\Models\Payroll\Type\Earning as EarningType;
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
        $data = config('payroll.seeds.payroll_statuses');

        foreach ($data as $datum) {
            DeductionType::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedPayslipStatuses()
    {
        $data = config('payroll.seeds.payslip_statuses');

        foreach ($data as $datum) {
            DeductionType::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedDeductionTypes()
    {
        $data = config('payroll.seeds.deduction_types');

        foreach ($data as $datum) {
            DeductionType::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }

    private function seedEarningTypes()
    {
        $data = config('payroll.seeds.earning_types');

        foreach ($data as $datum) {
            EarningType::create([
                'name'      => $datum,
                'code'      => Str::kebab($datum),
                'is_locked' => true,
            ]);
        }
    }
}
