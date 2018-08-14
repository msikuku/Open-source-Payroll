<?php

use Illuminate\Database\Seeder;

class PayrollTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->users = config('open-payroll.models.user')::all();
        $this->createPayrollForAYear();
    }

    private function createPayrollForAYear()
    {
        for ($i = 1; $i <= 12; ++$i) {
            factory(config('open-payroll.models.payroll'))->create([
                'user_id' => $this->users->shuffle()->id,
                'month'   => $i,
                'year'    => date('Y'),
                'date'    => date('Y-m-') . '27',
            ]);
        }
    }
}
