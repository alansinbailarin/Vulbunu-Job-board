<?php

namespace App\Http\Controllers;

use App\Models\JobModality;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Termwind\Components\Dd;

class TalentController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['job_title', 'location', 'jobmodality']);

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->state != null) {
                $filters['location'] = $user->state->name;
            }
        }

        if (auth()->check()) {
            $talents = User::query()
                ->when($request->input('job_title'), function ($query, $job_title) {
                    $query->where(function ($query) use ($job_title) {
                        $query->where('job_title', 'like', '%' . $job_title . '%')
                            ->orWhere('about_me', 'like', '%' . $job_title . '%')
                            ->orWhere('name', 'like', '%' . $job_title . '%')
                            ->orWhere('last_name', 'like', '%' . $job_title . '%');
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
                ->whereNotNull('name')
                ->whereNotNull('last_name')
                ->whereNotNull('username')
                ->whereNotNull('slug')
                ->whereNotNull('created_at')
                ->whereNotNull('email')
                ->whereNotNull('job_title')
                ->whereNotNull('about_me')
                ->whereNotNull('country_id')
                ->whereNotNull('state_id')
                ->whereNotNull('city_id')
                ->orderBy('created_at', 'desc')
                ->paginate()
                ->withQueryString();
        } else {
            $talents = User::query()
                ->when($request->input('job_title'), function ($query, $job_title) {
                    $query->where(function ($query) use ($job_title) {
                        $query->where('job_title', 'like', '%' . $job_title . '%')
                            ->orWhere('about_me', 'like', '%' . $job_title . '%')
                            ->orWhere('name', 'like', '%' . $job_title . '%')
                            ->orWhere('last_name', 'like', '%' . $job_title . '%');
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
                ->whereNotNull('name')
                ->whereNotNull('last_name')
                ->whereNotNull('username')
                ->whereNotNull('slug')
                ->whereNotNull('created_at')
                ->whereNotNull('email')
                ->whereNotNull('job_title')
                ->whereNotNull('about_me')
                ->whereNotNull('country_id')
                ->whereNotNull('state_id')
                ->whereNotNull('city_id')
                ->orderBy('created_at', 'desc')
                ->paginate()
                ->withQueryString();
        }

        $jobModalities = JobModality::all();
        $count = User::where('looking_for_job', true)->count();

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
