<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Job;
use App\Models\JobModality;
use App\Models\Periodicity;
use App\Models\Priority;
use App\Models\Salary;
use App\Models\SalaryType;
use App\Models\Tag;
use App\Models\Workday;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Storage;

class JobDetailController extends Controller
{
    public function updateJobStatus(Job $job, $status)
    {
        $user = auth()->user();

        if ($user) {
            $job->status = $status;

            $job->save();

            return redirect()->back()->with('success', 'Application status updated');
        } else {
            return redirect()->back()->with('success', 'You must log in to update the application status');
        }
    }

    public function edit(Job $job)
    {
        $user_id = Auth::user()->id;

        if (auth()->user()->id !== $job->user_id) {
            // Si no es el propietario, muestra un error o redirige a una página de acceso no autorizado
            abort(403, 'You dont have access to this data.');
        }

        $categories = Category::all();
        $jobModalities = JobModality::all();
        $workdays = Workday::all();
        $priorities = Priority::all();
        $currencies = Currency::all();
        $salariesTypes = SalaryType::all();
        $periodicities = Periodicity::all();
        $salary = Salary::where('job_id', $job->id)->first();
        $currency = Currency::where('id', $salary->currency_id)->first();
        $jobTags = Job::find($job->id)->tags;

        $tags = Tag::all();

        return Inertia::render('Jobs/Edit', [
            'job' => $job,
            'categories' => $categories,
            'jobModalities' => $jobModalities,
            'workdays' => $workdays,
            'priorities' => $priorities,
            'currencies' => $currencies,
            'salariesTypes' => $salariesTypes,
            'periodicities' => $periodicities,
            'tags' => $tags,
            'salary' => $salary,
            'currency' => $currency,
            'asignedTags' => $jobTags,
            'user_id' => $user_id,
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $validateData = $request->validate([
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
            'logo' => 'nullable|mimes:jpg,png,jpeg|max:1024'
        ]);

        if (!$job) {
            abort(404);
        }

        if ($request->hasFile('logo')) {
            $folder = "images";
            $img_path = Storage::disk('s3')->put($folder, $request->logo, 'public');
            $job->img_path = $img_path;
        }

        $job->update($validateData);

        $tagIds = $request->input('tag_id', []);
        $job->tag()->sync($tagIds);

        $salary = $job->salary;
        if ($salary) {
            $salary->update([
                'min' => $request->min,
                'max' => $request->max,
                'show' => $request->show,
                'currency_id' => $request->currency_id,
                'salary_type_id' => $request->salary_type_id,
                'periodicity_id' => $request->periodicity_id,
            ]);
        }

        $requirements = $job->requirements;
        if ($requirements) {
            $requirements->update([
                'description' => $request->requirements,
            ]);
        }

        $responsabilities = $job->responsabilities;
        if ($responsabilities) {
            $responsabilities->update([
                'description' => $request->responsabilities,
            ]);
        }

        $successMessage = 'Job updated successfully, ID: <a class="text-blue-600 font-semibold underline" href="' . route('jobs.show', $job->slug) . '">' . $job->id . '</a>';

        return redirect()->route('jobs.index')->with('success', $successMessage);
    }
}
