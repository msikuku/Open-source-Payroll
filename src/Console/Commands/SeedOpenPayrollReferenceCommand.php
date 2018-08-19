<?php

namespace CleaniqueCoders\OpenPayroll\Console\Commands;

use Illuminate\Console\Command;

class SeedOpenPayrollReferenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'open-payroll:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed Open Payroll references data';

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
            '--class' => 'OpenPayrollSeeder',
        ]);

        $this->info('Open Payroll references data has been seeded.');
    }
}
