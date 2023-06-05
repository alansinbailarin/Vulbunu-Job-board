<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $fechaActual = Carbon::now();
        $fechaHace14Dias = $fechaActual->subDays(14);

        $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')->where('featured', true)->latest()->take(6)->get();
        $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')->where('featured', false)->latest()->take(6)->get();

        $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')
            ->where('created_at', '>=', $fechaHace14Dias)
            ->orderBy('clicks', 'desc')
            ->take(6)
            ->get();

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

    public function show(Job $job)
    {
        $job->increment('clicks');

        return inertia('Jobs/Show', [
            'job' => $job->load('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity'),
        ]);
    }
}
