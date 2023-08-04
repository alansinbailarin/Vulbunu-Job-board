<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::find(1)->update(['name' => 'Test Task' . time()]);
    }
}
