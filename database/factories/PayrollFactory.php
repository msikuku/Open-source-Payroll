<?php


use Faker\Generator as Faker;

// 'payroll'         => \CleaniqueCoders\OpenPayroll\Models\Payroll\Payroll::class,
// 'payslip'         => \CleaniqueCoders\OpenPayroll\Models\Payslip\Payslip::class,
// 'deduction'       => \CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction::class,
// 'earning'         => \CleaniqueCoders\OpenPayroll\Models\Earning\Earning::class,
// Payrolls
// Payslips
// Earnings
// Deductions
$factory->define(config('open-payroll.models.payroll'), function (Faker $faker) {
    return [
    ];
});

$factory->define(config('open-payroll.models.payslip'), function (Faker $faker) {
    return [
        'total_earning'   => 0,
        'total_deduction' => 0,
        'basic_salary'    => 0,
        'gross_salary'    => 0,
        'net_salary'      => 0,
    ];
});

$factory->define(config('open-payroll.models.deduction'), function (Faker $faker) {
    return [
        'name'              => $faker->sentence,
        'description'       => $faker->sentence,
        'amount'            => $faker->numberBetween(10000, 20000),
        'deduction_type_id' => $faker->randomElement([1, 2]),
    ];
});

$factory->define(config('open-payroll.models.earning'), function (Faker $faker) {
    return [
        'name'            => $faker->sentence,
        'description'     => $faker->sentence,
        'amount'          => $faker->numberBetween(10000, 20000),
        'earning_type_id' => $faker->randomElement([1, 2]),
    ];
});
