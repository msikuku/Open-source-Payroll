<?php

namespace CleaniqueCoders\OpenPayroll\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'open-payroll:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Open Payroll';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $this->call('vendor:publish', [
            '--provider' => 'CleaniqueCoders\OpenPayroll\OpenPayrollServiceProvider',
            '--tag' => 'config migrations seeders',
            '--force' => true,
            '--no-interaction' => true,
            '--quiet' => true,
        ]);
    }
}
