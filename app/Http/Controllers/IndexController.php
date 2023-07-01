<?php

namespace App\Http\Controllers;

use App\Models\Job;
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

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->state_id) {
                $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('featured', true)
                    ->where('status', 'published')
                    ->orderBy('state_id', 'desc')
                    ->latest('created_at')
                    ->take(6)
                    ->get();
            } else {
                $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('featured', true)
                    ->where('status', 'published')
                    ->latest()
                    ->take(6)
                    ->get();
            }
        } else {
            $featuredJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                ->where('featured', true)
                ->where('status', 'published')
                ->latest()
                ->take(6)
                ->get();
        }

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->state_id) {
                $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('status', 'published')
                    ->orderBy('state_id', 'desc')
                    ->latest('created_at')
                    ->take(6)
                    ->get();
            } else {
                $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('status', 'published')
                    ->latest()
                    ->take(6)
                    ->get();
            }
        } else {
            $jobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                ->where('status', 'published')
                ->latest()
                ->take(6)
                ->get();
        }

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->state_id) {
                $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('created_at', '>=', $fechaHace14Dias)
                    ->where('status', 'published')
                    ->orderBy('state_id', 'desc')
                    ->latest('created_at')
                    ->take(6)
                    ->get();
            } else {
                $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                    ->where('created_at', '>=', $fechaHace14Dias)
                    ->where('status', 'published')
                    ->orderBy('clicks', 'desc')
                    ->take(6)
                    ->get();
            }
        } else {
            $popularJobs = Job::with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
                ->where('created_at', '>=', $fechaHace14Dias)
                ->where('status', 'published')
                ->orderBy('clicks', 'desc')
                ->take(6)
                ->get();
        }

        $jobs->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        $jobs->transform(function ($job) {
            $job->shortTitle = substr($job->title, 0, 40);
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

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->state_id) {
                $similares = Job::where('category_id', $job->category_id)
                    ->where('id', '!=', $job->id)
                    ->where('status', 'published')
                    ->where('state_id', $user->state_id)
                    ->latest('id')
                    ->take(6)
                    ->get();
            } else {
                $similares = Job::where('category_id', $job->category_id)
                    ->where('id', '!=', $job->id)
                    ->where('status', 'published')
                    ->latest('id')
                    ->take(6)
                    ->get();
            }
        } else {
            $similares = Job::where('category_id', $job->category_id)
                ->where('id', '!=', $job->id)
                ->where('status', 'published')
                ->latest('id')
                ->take(6)
                ->get();
        }

        $similares->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        $job->increment('clicks');

        return inertia('Jobs/Show', [
            'job' => $job->load('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city'),
            'similares' => $similares->load('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
        ]);
    }
}
