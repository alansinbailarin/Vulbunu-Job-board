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
use Termwind\Components\Dd;

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
            ],
            [
                'title.required' => 'El titulo es requerido.',
                'title.max' => 'La longitud máxima del campo titulo es de 255 caracteres.',
                'category_id.required' => 'El campo de categoria es requerido.',
                'category_id.exists' => 'El campo de categoria debe de contener una categoria existente.',
                'category_id.integer' => 'El campo categoria debe de ser un numero.',
                'apply_on.url' => 'El campo de aplicación debe de ser un campo valido de url.',
                'apply_on.required' => 'El campo de aplicación es un campo requerido.',
                'status.required' => 'El campo estatus es requerido.',
                'job_modality_id.required' => 'El campo de modalidad es requerido.',
                'job_modality_id.integer' => 'El campo de modalidad debe de ser numerico',
                'job_modality_id.exists' => 'El campo modalidad debe contener una modalidad existente.',
                'workday_id.required' => 'El campo de tipo de puesto es requerido.',
                'workday_id.integer' => 'El campo de tipo de puesto debe de ser numerico',
                'workday_id.exists' => 'El campo tipo de puesto debe contener un tipo de puesto existente.',
                'priority_id.required' => 'El campo de prioridad es requerido.',
                'priority_id.integer' => 'El campo de prioridad debe de ser numerico',
                'priority_id.exists' => 'El campo prioridad debe contener una prioridad existente.',
                'country_id.required' => 'El campo de pais es requerido.',
                'country_id.exists' => 'El campo pais debe contener un pais existente.',
                'state_id.required_with' => 'El campo de estado es requerido',
                'tag_id.required' => 'Por favor, selecciona al menos un tag.',
                'min.integer' => 'El campo minimo necesita ser un campo numerico.',
                'min.min' => 'El minimo para este campo es 1.',
                'min.gt' => 'El campo minimo debe de ser mayor a 0',
                'max.integer' => 'El campo maximo necesita ser un campo numerico.',
                'max.max' => 'El maximo para este campo es 300,000',
                'max.gt' => 'El campo maximo debe de ser mayor al campo minimo',
                'max.required_with' => 'Este campo es necesario cuando el campo minimo esta presente.',
                'show.required_with' => 'Este campo es necesario cuando el campo minimo esta presente.',
                'show.boolean' => 'Este campo debe de ser verdadero o falso.',
                'currency_id.required_with' => 'Por favor, selecciona una opción.',
                'salary_type_id.required_with' => 'Por favor, selecciona una opción.',
                'periodicity_id.required_with' => 'Por favor, selecciona una opción.',
                'description.required' => 'El campo de descripción es requerido.',
                'description.min' => 'El minimo de caracteres para este campo es de 20 caracteres.',
                'description.max' => 'El maximo de caracteres para este campo es de 1000 caracteres.',
                'extra_info.required' => 'El campo de información es requerido.',
                'extra_info.min' => 'El minimo de caracteres para este campo es de 20 caracteres.',
                'extra_info.max' => 'El maximo de caracteres para este campo es de 1000 caracteres.',
                'requirements.required' => 'El campo de requerimientos es requerido.',
                'requirements.min' => 'El minimo de caracteres para este campo es de 20 caracteres.',
                'requirements.max' => 'El maximo de caracteres para este campo es de 1000 caracteres.',
                'responsabilities.required' => 'El campo de requerimientos es requerido.',
                'responsabilities.min' => 'El minimo de caracteres para este campo es de 20 caracteres.',
                'responsabilities.max' => 'El maximo de caracteres para este campo es de 1000 caracteres.',
                'logo.required' => 'El logo es requerido.',
                'logo.mimes' => 'Solo son aceptados archivos con terminacion JPG, PNG o JPEG.',
                'logo.max' => 'El logo no debe de pesar mas de 1024 KB.'
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

        $successMessage = 'El empleo fue publicado satisfactoriamente, ID: <a class="text-blue-600 font-semibold underline" href="' . route('jobs.show', $job->slug) . '">' . $job->id . '</a>';

        return redirect()->route('jobs.index')->with('success', $successMessage);
    }
}
