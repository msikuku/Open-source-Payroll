<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payslip;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'payslip_statuses';
}
