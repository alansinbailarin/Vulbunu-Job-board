<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Interviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function createInterview(Request $request)
    {
        $user = Auth::user();

        $validateData = $request->validate([
            'applicant_id' => 'required|integer|exists:applicants,id',
            'interview_date' => 'required|date|after:yesterday',
            'interview_type' => 'required|string|max:255',
            'interview_link' => 'url|required',
            'interview_duration' => 'required',
            'interview_observation' => 'required|string|max:255',
        ]);

        $interview = Interviews::create($validateData);

        $interview->interviewer_name = $user->name . ' ' . $user->last_name;
        $interview->confirmation_date = $interview->created_at;
        $interview->status = 'approved';

        $interview->save();

        return redirect()->back()->with('success', 'Interview created');
    }

    public function edit(Interviews $interview)
    {
        $interview = Interviews::find($interview->id);

        return inertia('Interviews/Edit', [
            'interview' => $interview,
        ]);
    }

    public function update(Interviews $interview)
    {
        $validateData = request()->validate([
            'interviewer_name' => 'required|string|max:255',
            'interview_date' => 'date',
            'interview_type' => 'required|string|max:255',
            'interview_link' => 'url|required',
            'interview_duration' => 'required',
            'interview_observation' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'interview_feedback' => 'nullable|string|max:255',
        ]);

        $interview->update($validateData);

        return redirect()->back()->with('success', 'Interview updated');
    }
}
