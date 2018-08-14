<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(config('open-payroll.models.user'));
    }

    public function payslips()
    {
        return $this->hasMany(config('open-payroll.models.payslip'));
    }

    public function status()
    {
        return $this->hasOne(config('open-payroll.models.payroll_status'));
    }
}
