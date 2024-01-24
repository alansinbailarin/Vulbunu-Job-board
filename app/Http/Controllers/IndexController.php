<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Subscriber;
use App\Notifications\NewSubscriberNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{


    public function index()
    {
        // dd(Auth::user());
        $fechaActual = Carbon::now();
        $fechaHace14Dias = $fechaActual->subDays(14);

        $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
            ->where('featured', true)
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
            ->where('created_at', '>=', $fechaHace14Dias)
            ->where('status', 'published')
            ->orderByRaw('clicks / (TIMESTAMPDIFF(SECOND, created_at, NOW()) + 1) DESC')
            ->take(6)
            ->get();

        $jobs->transform(function ($job) {
            $job->shortTitle = substr($job->title, 0, 40);
            return $job;
        });

        $jobs->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        $featuredJobs->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        $popularJobs->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        return inertia('Index/Index', [
            'jobs' => $jobs,
            'featuredJobs' => $featuredJobs,
            'popularJobs' => $popularJobs,
        ]);
    }

    public function store(Request $request)
    {
        $validateEmail = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        $subscriber = Subscriber::create($validateEmail);

        $subscriber->save();

        // send email when user suscribe
        $subscriber->notify(new NewSubscriberNotification($subscriber));

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter');
    }

    public function show(Job $job)
    {
        $authUser = auth()->user();
        $jobId = $job->id;

        if ($job->status != 'published') {
            return redirect()->back();
        } else {
            $similares = Job::where('category_id', $job->category_id)
                ->where('id', '!=', $job->id)
                ->where('status', 'published')
                ->latest('id')
                ->take(6)
                ->get();

            $similares->transform(function ($job) {
                $job->shortDescription = substr($job->description, 0, 70);
                return $job;
            });

            $job->increment('clicks');

            return inertia('Jobs/Show', [
                'job' => $job->load('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city'),
                'similares' => $similares->load('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city'),
                'authUser' => $authUser,
                'jobId' => $jobId
            ]);
        }
    }
}
