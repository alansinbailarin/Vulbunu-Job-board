<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('Index/Index', [
            'jobs' => Job::with('category', 'user')->latest()->get(),
        ]);
    }

    public function show(Job $job)
    {
        $job->increment('clicks');

        return inertia('Jobs/Show', [
            'job' => $job->load('category', 'user'),
        ]);
    }
}
