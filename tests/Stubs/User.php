<?php

namespace CleaniqueCoders\OpenPayroll\Tests\Stubs;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	
	protected $guarded = ['id'];
}
