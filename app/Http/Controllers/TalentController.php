<?php

namespace App\Http\Controllers;

use App\Models\JobModality;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLocation;
use Termwind\Components\Dd;

class TalentController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['job_title', 'location', 'jobmodality']);

        if (auth()->check()) {
            $talents = User::query()
                ->when($request->input('job_title'), function ($query, $job_title) {
                    $query->where(function ($query) use ($job_title) {
                        $query->where('job_title', 'like', '%' . $job_title . '%')
                            ->orWhere('about_me', 'like', '%' . $job_title . '%');
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
                ->when($request->input('jobModality'), function ($query, $jobModality) {
                    $query->where('job_modality_id', $jobModality);
                })
                ->with('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city')->where('looking_for_job', true)
                ->where('id', '!=', auth()->user()->id)
                ->get();
        } else {
            $talents = User::query()
                ->when($request->input('job_title'), function ($query, $job_title) {
                    $query->where(function ($query) use ($job_title) {
                        $query->where('job_title', 'like', '%' . $job_title . '%')
                            ->orWhere('about_me', 'like', '%' . $job_title . '%');
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
                ->when($request->input('jobModality'), function ($query, $jobModality) {
                    $query->where('job_modality_id', $jobModality);
                })
                ->with('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city')->where('looking_for_job', true)
                ->get();
        }

        $jobModalities = JobModality::all();
        $count = $talents->count();

        return inertia('Talent/Index', [
            'talents' => $talents,
            'count' => $count,
            'filters' => $filters,
            'jobModalities' => $jobModalities,
        ]);
    }

    public function show(User $talent)
    {
        return inertia('Talent/Show', [
            'talent' => $talent->load('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city'),
        ]);
    }
}
