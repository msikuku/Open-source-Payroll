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
            '--force'    => true,
        ]);

        if ('testing' != app()->environment()) {
            $route = file_get_contents(__DIR__ . '/stubs/routes/web.php.stub');
            $file  = base_path('routes/web.php');
            file_put_contents($file, $route, FILE_APPEND | LOCK_EX);
        }
        $this->line(' ');
        $this->info('Open Payroll has been sucessfully installed! Thanks for using Open Payroll!');
    }
}
