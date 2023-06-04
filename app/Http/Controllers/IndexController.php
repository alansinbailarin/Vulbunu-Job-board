<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')->where('featured', true)->latest()->take(6)->get();
        $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')->where('featured', false)->latest()->take(6)->get();
        $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity')->orderBy('clicks', 'desc')->take(6)->get();

        // Recortar la descripción de cada trabajo a 50 caracteres
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
