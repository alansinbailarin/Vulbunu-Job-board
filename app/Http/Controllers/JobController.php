<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Job;
use App\Models\JobModality;
use App\Models\JobTag;
use App\Models\Periodicity;
use App\Models\Priority;
use App\Models\Requirement;
use App\Models\Responsability;
use App\Models\Salary;
use App\Models\SalaryType;
use App\Models\State;
use App\Models\Tag;
use App\Models\Workday;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['title', 'location', 'category', 'jobModality', 'workday']);

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->state != null) {
                $filters['location'] = $user->state->name;
            }
        }

        $jobs = Job::query()
            ->when($request->input('title'), function ($query, $title) {
                $query->where(function ($query) use ($title) {
                    $query->where('title', 'like', '%' . $title . '%')
                        ->orWhere('description', 'like', '%' . $title . '%')
                        ->orWhere('uuid', 'like', '%' . $title . '%');
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

        $count = Job::where('status', 'published')->count();

        return Inertia::render('Jobs/Index', [
            'jobs' => $jobs,
            'categories' => $categories,
            'jobModalities' => $jobModalities,
            'workdays' => $workdays,
            'filters' => $filters,
            'count' => $count,
        ]);
    }

    public function create(Request $request)
    {

        $user_id = Auth::user()->id;

        $categories = Category::all();
        $jobModalities = JobModality::all();
        $workdays = Workday::all();
        $priorities = Priority::all();
        $currencies = Currency::all();
        $salariesTypes = SalaryType::all();
        $periodicities = Periodicity::all();
        $tags = Tag::all();

        return Inertia::render('Jobs/Create', [
            'categories' => $categories,
            'jobModalities' => $jobModalities,
            'workdays' => $workdays,
            'priorities' => $priorities,
            'currencies' => $currencies,
            'salariesTypes' => $salariesTypes,
            'periodicities' => $periodicities,
            'tags' => $tags,
            'user_id' => $user_id,
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
        $validateData = $request->validate(
            [
                'user_id' => 'required|integer|exists:users,id',
                'title' => 'required|string|max:255',
                'category_id' => 'required|integer|exists:categories,id',
                'apply_on' => 'url|required',
                'color' => 'nullable',
                'status' => 'required',
                'job_modality_id' => 'required|integer|exists:job_modalities,id',
                'workday_id' => 'required|integer|exists:workdays,id',
                'priority_id' => 'required|integer|exists:priorities,id',
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required_with:country_id',
                'city_id' => 'nullable',
                'tag_id' => 'required|array',
                'tag_id.*' => 'integer|exists:tags,id',
                'min' => 'nullable|integer|min:1|gt:0',
                'max' => 'nullable|integer|max:300000|gt:min|required_with:min',
                'show' => 'required_with:min|required_with:max|nullable|boolean',
                'currency_id' => 'required_with:min|required_with:max|nullable|integer|exists:currencies,id',
                'salary_type_id' => 'required_with:min|required_with:max|nullable|integer|exists:salary_types,id',
                'periodicity_id' => 'required_with:min|required_with:max|nullable|integer|exists:periodicities,id',
                'description' => 'required|string|min:20|max:1000',
                'extra_info' => 'required|string|min:20|max:1000',
                'requirements' => 'required|string|min:20|max:1000',
                'responsabilities' => 'required|string|min:20|max:1000',
                'logo' => 'required|mimes:jpg,png,jpeg|max:1024'
            ]
        );

        $folder = "images";
        $img_path = Storage::disk('s3')->put($folder, $request->logo, 'public');
        $slugWithoutNumbers = str_replace(' ', '-', $request->title);
        $slug = $slugWithoutNumbers . '-' . rand(1000, 9999);
        $job = Job::create($validateData);
        $deathline = Carbon::now()->addDays($job->featured ? 45 : 25);
        $job->slug = $slug;
        $job->img_path = $img_path;
        $job->deathline = $deathline;
        $job->save();

        $tagIds = $request->input('tag_id', []);

        $salary = Salary::create([
            'min' => $request->min,
            'max' => $request->max,
            'show' => $request->show,
            'job_id' => $job->id,
            'currency_id' => $request->currency_id,
            'salary_type_id' => $request->salary_type_id,
            'periodicity_id' => $request->periodicity_id,
        ]);

        $salary->save();

        foreach ($tagIds as $tagId) {
            JobTag::create([
                'job_id' => $job->id,
                'tag_id' => $tagId,
            ]);
        }

        $requirements = Requirement::create([
            'description' => $request->requirements,
            'job_id' => $job->id,
        ]);

        $responsabilities = Responsability::create([
            'description' => $request->responsabilities,
            'job_id' => $job->id,
        ]);

        $requirements->save();
        $responsabilities->save();

        $successMessage = 'Job published successfuly, ID: <a class="text-blue-600 font-semibold underline" href="' . route('jobs.show', $job->slug) . '">' . $job->id . '</a>';

        return redirect()->route('jobs.index')->with('success', $successMessage);
    }

    public function myPublishedJobs()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->jobs->count() > 0) {
                $oneWeekAgo = Carbon::now()->subWeek();
                $totalJobsCount = Job::where('user_id', $user->id)->count();
                $draftJobsCount = Job::where('user_id', $user->id)->where('status', 'draft')->count();
                $publishedJobsCount = Job::where('user_id', $user->id)->where('status', 'published')->count();
                $archivedJobsCount = Job::where('user_id', $user->id)->where('status', 'archived')->count();

                $percentajeDraft = ($draftJobsCount * 100) / $totalJobsCount;
                $percentajePublished = ($publishedJobsCount * 100) / $totalJobsCount;
                $percentajeArchived = ($archivedJobsCount * 100) / $totalJobsCount;

                // Obtenemos nuestros trabajos publicados con los aplicantes
                $jobs = Job::where('user_id', $user->id)
                    ->orderBy('status', 'desc')
                    ->get();

                return inertia('User/MyJobs', [
                    'jobs' => $jobs,
                    'totalJobsCount' => $totalJobsCount,
                    'draftJobsCount' => $draftJobsCount,
                    'publishedJobsCount' => $publishedJobsCount,
                    'archivedJobsCount' => $archivedJobsCount,
                    'percentajeDraft' => $percentajeDraft,
                    'percentajePublished' => $percentajePublished,
                    'percentajeArchived' => $percentajeArchived,
                ]);
            } else {
                abort(403, 'No one job published');
            }
        }
    }

    public function jobsApplicants(Job $job)
    {
        $user = Auth::user();

        if ($user) {
            if (auth()->user()->id !== $job->user_id) {
                // Si no es el propietario, muestra un error o redirige a una página de acceso no autorizado
                abort(403, 'You dont have access to this data.');
            }

            // El usuario autenticado es el propietario del trabajo, puedes continuar con el código para obtener la información del trabajo y sus aplicantes
            $jobWithApplicantsAndInterviews = Job::where('id', $job->id)
                ->with(['applicant.interviews', 'applicant.user'])
                ->firstOrFail();

            $totalAppsCount = $jobWithApplicantsAndInterviews->applicant->count();
            $pendingAppsCount = $jobWithApplicantsAndInterviews->applicant->where('status', 'pending')->count();
            $approvedAppsCount = $jobWithApplicantsAndInterviews->applicant->where('status', 'approved')->count();
            $rejectedAppsCount = $jobWithApplicantsAndInterviews->applicant->where('status', 'rejected')->count();

            if ($totalAppsCount > 0) {
                $percentajeTotal = ($totalAppsCount / $totalAppsCount) * 100;
                $percentajePending = ($pendingAppsCount / $totalAppsCount) * 100;
                $percentajeApproved = ($approvedAppsCount / $totalAppsCount) * 100;
                $percentajeRejected = ($rejectedAppsCount / $totalAppsCount) * 100;
            } else {
                // Manejar el caso en el que no hay aplicantes (por ejemplo, establecer los porcentajes en cero)
                $percentajeTotal = 0;
                $percentajePending = 0;
                $percentajeApproved = 0;
                $percentajeRejected = 0;
            }

            $applicantPerJob = $jobWithApplicantsAndInterviews->applicant->count();

            return inertia('User/JobApplicants', [
                'job' => $jobWithApplicantsAndInterviews,
                'totalAppsCount' => $totalAppsCount,
                'pendingAppsCount' => $pendingAppsCount,
                'approvedAppsCount' => $approvedAppsCount,
                'rejectedAppsCount' => $rejectedAppsCount,
                'percentajeTotal' => $percentajeTotal,
                'percentajePending' => $percentajePending,
                'percentajeApproved' => $percentajeApproved,
                'percentajeRejected' => $percentajeRejected,
            ]);
        }
    }
}
