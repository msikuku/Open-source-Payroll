<?php

namespace CleaniqueCoders\OpenPayroll\Models\Earning;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
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
        return $this->hasOne(config('payroll.models.earning_types'));
    }
}
