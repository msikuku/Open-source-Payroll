<?php

use CleaniqueCoders\OpenPayroll\Traits\ReferenceTrait;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    use ReferenceTrait;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->seedReferences();
    }
}
