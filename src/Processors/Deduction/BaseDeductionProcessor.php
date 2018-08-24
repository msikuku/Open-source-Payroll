<?php

namespace CleaniqueCoders\OpenPayroll\Processors\Deduction;

class BaseDeductionProcessor
{
    public $deduction;

    public function __construct($identifier)
    {
        if (is_string($identifier) || is_int($identifier)) {
            $this->deduction = config('open-payroll.models.deduction')::query()
                ->with('type')
                ->findByHashSlugOrId($identifier);
        }

        if (is_object($identifier)) {
            $this->deduction($identifier);
        }
    }

    public static function make($identifier)
    {
        return new self($identifier);
    }

    public function deduction($deduction)
    {
        $this->deduction = $deduction;

        return $this;
    }

    abstract public function calculate();
}
