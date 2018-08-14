<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payslip;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(config('open-payroll.models.user'));
    }

    public function payroll()
    {
        return $this->belongsTo(config('open-payroll.models.payroll'));
    }
}
