<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Traits;

use CleaniqueCoders\OpenPayroll\Models\Earning\Earning;
use CleaniqueCoders\OpenPayroll\Models\Earning\Type as EarningType;
use Illuminate\Support\Str;

trait EarningTrait
{
    public $payslip;
    public $earning_types;

    public function getAllEarningTypes()
    {
        return $this->earning_types = EarningType::all();
    }
}
