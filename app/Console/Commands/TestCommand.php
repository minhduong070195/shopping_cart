<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'function:testCommand {name} {--function=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        // get argument value
        $name = $this->argument('name');

        // get option value
        $function = $this->option('function');


        echo 'Hello '.$name. ', ban '.$function. ' tuoi phai khong ?';
        return;
    }
}
