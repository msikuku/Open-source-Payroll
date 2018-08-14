<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class PayrollFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function it_has_seeders()
    {
        $this->assertFileExists(database_path('seeds/PayrollSeeder.php'));
        $this->assertFileExists(database_path('seeds/PayrollTestSeeder.php'));
    }

    public function it_can_seed_users()
    {
    }
}
