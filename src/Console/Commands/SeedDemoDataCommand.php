<?php

namespace CleaniqueCoders\OpenPayroll\Console\Commands;

use Illuminate\Console\Command;

class SeedDemoDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'open-payroll:seed:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Open Payroll demo data';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('db:seed', [
            '--class' => 'OpenPayrollDemoSeeder',
        ]);

        $this->info('Open Payroll demo data has been seeded.');
    }
}
