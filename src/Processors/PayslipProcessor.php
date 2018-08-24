<?php

namespace CleaniqueCoders\OpenPayroll\Processors;

use CleaniqueCoders\OpenPayroll\Contracts\CalculateContract;

class PayslipProcessor implements CalculateContract
{
    public $payslip;

    public function __construct($identifier = null)
    {
        if (! is_null($identifier)) {
            if (is_string($identifier) || is_int($identifier)) {
                $this->payslip = config('open-payroll.models.payslip')::query()
                    ->with('earnings', 'deductions', 'payroll', 'employee', 'employee.salary')
                    ->whereId($identifier)
                    ->orWhere('hashslug', $identifier)
                    ->firstOrFail();
            }

            if (is_object($identifier)) {
                $this->payslip($identifier);
            }
        }
    }

    public static function make($identifier = null)
    {
        return new self($identifier);
    }

    public function payslip($payslip)
    {
        $this->payslip = $payslip;

        return $this;
    }

    public function calculate()
    {
        if ($this->payslip) {
            $employee   = $this->payslip->employee;
            $salary     = $employee->salary;
            $payroll    = $this->payslip->payroll;
            $earnings   = $this->payslip->earnings;
            $deductions = $this->payslip->deductions;

            $this->payslip->basic_salary = $gross_salary = $net_salary = $salary->amount;
            foreach ($earnings as $earning) {
                $class = config('open-payroll.processors.earnings.' . studly_case($earning->type->name));
                if (class_exists($class)) {
                    $gross_salary += $class::make($earning)->calculate();
                } else {
                    $gross_salary += $earning->amount;
                }
            }

            $deduction_amount = 0;
            foreach ($deductions as $deduction) {
                $class = config('open-payroll.processors.deductions.' . studly_case($earning->type->name));
                if (class_exists($class)) {
                    $deduction_amount += $class::make($deduction)->calculate();
                } else {
                    $deduction_amount += $earning->amount;
                }
            }

            $this->payslip->gross_salary = $gross_salary;
            $this->payslip->net_salary   = $gross_salary - $deduction_amount;

            $this->payslip->save();
        }

        return $this;
    }
}
