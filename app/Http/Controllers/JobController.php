<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobModality;
use App\Models\Workday;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['title', 'location', 'category', 'jobModality', 'workday']);

        $jobs = Job::query()
            ->when($request->input('title'), function ($query, $title) {
                $query->where(function ($query) use ($title) {
                    $query->where('title', 'like', '%' . $title . '%')
                        ->orWhere('description', 'like', '%' . $title . '%');
                });
            })
            ->when($request->input('location'), function ($query, $location) {
                $query->where(function ($query) use ($location) {
                    $query->where(function ($query) use ($location) {
                        $query->whereHas('country', function ($query) use ($location) {
                            $query->where('name', 'like', '%' . $location . '%');
                        });
                    })
                        ->orWhere(function ($query) use ($location) {
                            $query->whereHas('state', function ($query) use ($location) {
                                $query->where('name', 'like', '%' . $location . '%');
                            });
                        })
                        ->orWhere(function ($query) use ($location) {
                            $query->whereHas('city', function ($query) use ($location) {
                                $query->where('name', 'like', '%' . $location . '%');
                            });
                        });
                });
            })
            ->when($request->input('category'), function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($request->input('jobModality'), function ($query, $jobModality) {
                $query->where('job_modality_id', $jobModality);
            })
            ->when($request->input('workday'), function ($query, $workday) {
                $query->where('workday_id', $workday);
            })
            ->with('category', 'user', 'tag', 'seniority', 'jobmodality', 'workday', 'salary', 'salary.currency', 'salary.periodicity', 'priority', 'responsability', 'requirement', 'country', 'state', 'city')
            ->where('status', 'published')
            ->orderBy('featured', 'desc')
            ->get();
        // ->paginate()
        // ->withQueryString();

        $categories = Category::all();
        $jobModalities = JobModality::all();
        $workdays = Workday::all();

        $jobs->transform(function ($job) {
            $job->shortDescription = substr($job->description, 0, 70);
            return $job;
        });

        return Inertia::render('Jobs/Index', [
            'jobs' => $jobs,
            'categories' => $categories,
            'jobModalities' => $jobModalities,
            'workdays' => $workdays,
            'filters' => $filters,
        ]);
    }
}
