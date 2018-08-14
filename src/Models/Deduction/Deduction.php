<?php

namespace CleaniqueCoders\OpenPayroll\Models\Deduction;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(config('payroll.models.user'));
    }

    public function payroll()
    {
        return $this->belongsTo(config('payroll.models.payroll'));
    }

    public function payslip()
    {
        return $this->belongsTo(config('payroll.models.payslip'));
    }

    public function type()
    {
        return $this->hasOne(config('payroll.models.deduction_types'));
    }
}
