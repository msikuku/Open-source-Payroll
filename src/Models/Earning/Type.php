<?php

namespace CleaniqueCoders\OpenPayroll\Models\Earning;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];
    protected $table   = 'earning_types';
}
