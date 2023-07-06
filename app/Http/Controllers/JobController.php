<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Job;
use App\Models\JobModality;
use App\Models\Periodicity;
use App\Models\Priority;
use App\Models\SalaryType;
use App\Models\State;
use App\Models\Workday;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['title', 'location', 'category', 'jobModality', 'workday']);

        if (Auth::check()) {
            $user = Auth::user();
            $filters['location'] = $user->state->name;
        }

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
            ->paginate()
            ->withQueryString();

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

    public function create(Request $request)
    {
        $categories = Category::all();
        $jobModalities = JobModality::all();
        $workdays = Workday::all();
        $priorities = Priority::all();
        // $countries = Country::all();
        // $country_id = $request->input('countryInput');
        // $states = State::where('country_id', $country_id)->get();
        // $cities = City::all();
        $currencies = Currency::all();
        $salariesTypes = SalaryType::all();
        $periodicities = Periodicity::all();

        return Inertia::render('Jobs/Create', [
            'categories' => $categories,
            'jobModalities' => $jobModalities,
            'workdays' => $workdays,
            'priorities' => $priorities,
            // 'countries' => $countries,
            // 'states' => $states,
            // 'cities' => $cities,
            'currencies' => $currencies,
            'salariesTypes' => $salariesTypes,
            'periodicities' => $periodicities,
        ]);
    }

    public function getCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return response()->json($states);
    }

    public function getCities($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return response()->json($cities);
    }

    public function store(Request $request)
    {
    }
}
