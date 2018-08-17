<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use CleaniqueCoders\OpenPayroll\Tests\Traits\PayrollTrait;
use CleaniqueCoders\OpenPayroll\Tests\Traits\UserTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PayslipDatabaseTest extends TestCase
{
    use PayrollTrait, RefreshDatabase, UserTrait;

    public function setUp()
    {
        parent::setUp();
        $this->seedPayrollSeeder();
        $this->reseedUsers();
        $this->seedOnePayrollData();
    }
}
