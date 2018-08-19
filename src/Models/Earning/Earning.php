<?php

namespace CleaniqueCoders\OpenPayroll\Models\Earning;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
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

    public function payslip()
    {
        return $this->belongsTo(config('open-payroll.models.payslip'));
    }

    public function type()
    {
        return $this->belongsTo(config('open-payroll.models.earning_types'), 'earning_type_id');
    }
}
