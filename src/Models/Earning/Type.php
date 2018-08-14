<?php

namespace CleaniqueCoders\OpenPayroll\Models\Payroll;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'earning_types';
}
