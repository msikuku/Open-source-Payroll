<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Open Payroll Seeder Data
    |--------------------------------------------------------------------------
    |
    | These values is the default for the references data which refer to
    | deduction types, earning types, payroll and payslip statuses.
    | You may add / remove as necessary for your needs.
    |
    */

    'seeds' => [
        'deduction_types' => [
            'Loan',
            'Income Tax',
        ],
        'earning_types' => [
            'Basic',
            'Overtime',
            'Allowance',
            'Bonus',
            'Claim',
            'Other',
        ],
        'payroll_statuses' => [
            'Active', 'Inactive', 'Locked',
        ],
        'payslip_statuses' => [
            'Active', 'Inactive', 'Locked',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Open Payroll Models
    |--------------------------------------------------------------------------
    |
    | These values is the default for the models used in Open Payroll.
    | You may extend / replace the following models as necessary.
    |
    */

    'models' => [
        'user'             => \App\User::class,
        'employee'         => \App\Models\OpenPayroll\Employee::class,
        'payroll'          => \CleaniqueCoders\OpenPayroll\Models\Payroll\Payroll::class,
        'payroll_statuses' => \CleaniqueCoders\OpenPayroll\Models\Payroll\Status::class,
        'payslip'          => \CleaniqueCoders\OpenPayroll\Models\Payslip\Payslip::class,
        'payslip_statuses' => \CleaniqueCoders\OpenPayroll\Models\Payslip\Status::class,
        'deduction'        => \CleaniqueCoders\OpenPayroll\Models\Deduction\Deduction::class,
        'deduction_types'  => \CleaniqueCoders\OpenPayroll\Models\Deduction\Type::class,
        'earning'          => \CleaniqueCoders\OpenPayroll\Models\Earning\Earning::class,
        'earning_types'    => \CleaniqueCoders\OpenPayroll\Models\Earning\Type::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Open Payroll Tables
    |--------------------------------------------------------------------------
    |
    | These values is the tables used in Open Payroll. Changing these values
    | require additional setup on seeders and models.
    |
    */

    'tables' => [
        'names' => [
            'earnings',
            'deductions',
            'payslips',
            'payrolls',
            'payroll_statuses',
            'earning_types',
            'deduction_types',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Open Payroll Payslip Processors
    |--------------------------------------------------------------------------
    |
    | These values is the default processors for earnings and deductions.
    | By default, no processors required for each earning and deductions.
    |
    */

   'processors' => [
        'default_earning'   => \CleaniqueCoders\OpenPayroll\Processors\Earning\BaseEarningProcessor::class,
        'default_deduction' => \CleaniqueCoders\OpenPayroll\Processors\Earning\BaseEarningProcessor::class,
        'earnings'          => [
            // 'Basic'     => \CleaniqueCoders\OpenPayroll\Processors\Earning\BasicEarningProcessor::class,
            // 'Overtime'  => \CleaniqueCoders\OpenPayroll\Processors\Earning\OvertimeEarningProcessor::class,
            // 'Allowance' => \CleaniqueCoders\OpenPayroll\Processors\Earning\AllowanceEarningProcessor::class,
            // 'Bonus'     => \CleaniqueCoders\OpenPayroll\Processors\Earning\BonusEarningProcessor::class,
            // 'Claim'     => \CleaniqueCoders\OpenPayroll\Processors\Earning\ClaimEarningProcessor::class,
            // 'Other'     => \CleaniqueCoders\OpenPayroll\Processors\Earning\OtherEarningProcessor::class,
        ],
        'deductions' => [
            // 'Loan'      => \CleaniqueCoders\OpenPayroll\Processors\Deduction\LoanProcessor::class,
            // 'IncomeTax' => \CleaniqueCoders\OpenPayroll\Processors\Deduction\IncomeTaxProcessor::class,
        ],
   ],
];
