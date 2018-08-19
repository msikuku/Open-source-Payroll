<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payroll;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    public function getTitleAttribute()
    {
        return 'Payroll for ' . \Carbon\Carbon::parse($this->year . '-' . $this->month . '-1')->format('M') . ' ' . $this->year;
    }

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
