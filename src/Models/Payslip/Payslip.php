<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payslip;

use CleaniqueCoders\OpenPayroll\Models\Earning\Deduction;
use CleaniqueCoders\OpenPayroll\Models\Earning\Earning;
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

    public function getTitleAttribute()
    {
        return 'Payslip from ' . $this->payroll->title;
    }

    public function employee()
    {
        return $this->belongsTo(config('open-payroll.models.employee'), config('open-payroll.models.employee_fk', 'user_id'));
    }

    public function earnings()
    {
        return $this->hasMany(config('open-payroll.models.earning'));
    }

    public function deductions()
    {
        return $this->hasMany(config('open-payroll.models.deduction'));
    }
}
