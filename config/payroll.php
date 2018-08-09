<?php


return [
    'deduction_types' => [
        'Loan',
        'Income Tax',
    ],
    'earning_types' => [
        'Basic',
        'Overtime',
        'Allowance',
        'Bonus',
        'Other',
    ],
    'models' => [
        'user'           => \App\User::class,
        'payroll'        => \CleaniqueCoders\OpenPayroll\Models\Payroll::class,
        'payroll_status' => \CleaniqueCoders\OpenPayroll\Models\Payroll\Status::class,
        'payslip'        => \CleaniqueCoders\OpenPayroll\Models\Payslip::class,
    ],
    'tables' => [
        'prefix' => 'op_',
        'names'  => [
            'payslip_earnings',
            'payslip_deductions',
            'payslips',
            'payrolls',
            'payroll_statuses',
            'earning_types',
            'deduction_types',
        ],
    ],
];
