<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class PayrollTest extends TestCase
{
    use RefreshDatabase, Traits\PayrollTrait;

    public function setUp()
    {
        parent::setUp();

        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-config',
        ]);

        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-migrations',
        ]);

        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'open-payroll-seeders',
        ]);

        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench']);
    }
}
