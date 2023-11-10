<?php

namespace App\Console\Commands;

use App\Mail\FeaturedJobsMail;
use App\Models\Job;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class SendJobsToCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-jobs-to-customers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send featured jobs weekly to customers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $customers = User::get();
        $suscribers = Subscriber::get();

        $jobs = Job::where('featured', true)
            ->where('status', 'published')
            ->get();

        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new FeaturedJobsMail($jobs));
        }

        foreach ($suscribers as $suscriber) {
            Mail::to($suscriber->email)->send(new FeaturedJobsMail($jobs));
        }
    }
}
