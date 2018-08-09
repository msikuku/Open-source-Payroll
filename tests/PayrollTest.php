<?php

namespace CleaniqueCoders\OpenPayroll\Tests;

class PayrollTest extends TestCase
{
    /** @test */
    public function it_has_config_file()
    {
        $this->assertTrue(file_exists(config_path('payroll.php')));
    }

    /** @test */
    public function it_has_users_table()
    {
        $this->assertHasTable('users');
    }

    /** @todo */
    // public function it_has_all_payroll_related_tables()
    // {
    //     foreach (config('payroll.tables.names') as $table) {
    //         $this->assertHasTable($table);
    //     }
    // }
}
