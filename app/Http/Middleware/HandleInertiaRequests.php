<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'toast' => session('toast'),
            'user' => $request->user() ? [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'email' => $request->user()->email,
                'last_name' => $request->user()->last_name,
                'username' => $request->user()->username,
                'slug' => $request->user()->slug,
                'job_title' => $request->user()->job_title,
                'avatar' => $request->user()->avatar,
                'cover_photo' => $request->user()->cover_photo,
                'looking_for_job' => $request->user()->looking_for_job,
                'phone' => $request->user()->phone,
                'about_me' => $request->user()->about_me,
                'linkedin' => $request->user()->linkedin,
                'birthdate' => $request->user()->birthdate,
                'cv' => $request->user()->cv,
                'job_modality_id' => $request->user()->job_modality_id,
                'gender_id' => $request->user()->gender_id,
                'country_id' => $request->user()->country_id,
                'country' => $request->user()->country,
                'state_id' => $request->user()->state_id,
                'state' => $request->user()->state,
                'city_id' => $request->user()->city_id,
                'city' => $request->user()->city,
                'skills' => $request->user()->skill,
                'applications' => $request->user()->applicant,
                'userJobs' => $request->user()->jobs,
                'notifications' => $request->user()->notifications,
                'notification' => $request->user()->notification,
            ] : null,
            'flash' => fn () => [
                'success' => session('success'),
                'error' => session('error'),
            ],
        ]);
    }
}
