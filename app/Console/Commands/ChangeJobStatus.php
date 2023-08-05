<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Job;

class ChangeJobStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:change-job-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the job status from published to archived if the deathline is passed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jobs = Job::where('status', 'published')->get();

        foreach ($jobs as $job) {
            if ($job->deathline != null) {
                if (strtotime($job->deathline) < time()) {
                    $job->update(['status' => 'archived']);
                }
            }
        }
    }
}
