<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLocation;
use Termwind\Components\Dd;

class TalentController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check()) {
            $talents = User::with('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city')->where('looking_for_job', true)
                ->where('id', '!=', auth()->user()->id)
                ->get();
        } else {
            $talents = User::with('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city')->where('looking_for_job', true)
                ->get();
        }

        $count = $talents->count();

        return inertia('Talent/Index', [
            'talents' => $talents,
            'count' => $count,
        ]);
    }

    public function show(User $talent)
    {
        return inertia('Talent/Show', [
            'talent' => $talent->load('jobmodality', 'gender', 'skill', 'language', 'experience', 'education', 'country', 'state', 'city')
        ]);
    }
}
