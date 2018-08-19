<?php

namespace CleaniqueCoders\OpenPayroll\Models\Deduction;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
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
        return $this->belongsTo(config('open-payroll.models.deduction_types'), 'deduction_type_id');
    }
}
