<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class ServeActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command clean the cache, config and do optimize. And active server';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    { 
        Artisan::call('config:clear');

        echo "config:clear \n";

        Artisan::call('cache:clear');

        echo "cache:clear \n";

        Artisan::call("optimize");

        echo "optimize \n";

        echo "SERVER ON";
        
        Artisan::call("serve");

       

        return Command::SUCCESS;
    }
}
