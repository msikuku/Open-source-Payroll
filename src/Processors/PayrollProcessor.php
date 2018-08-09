<?php

namespace CleaniqueCoders\OpenPayroll\Processors;

use CleaniqueCoders\OpenPayroll\Models\Payroll;

class PayrollProcessor
{
    protected $payroll;

    public function __construct($hashslug = null)
    {
        $this->payroll = Payroll::withDetails()->findByHashSlug();
    }

    public static function make($hashslug = null)
    {
        return new static($hashslug);
    }
}
