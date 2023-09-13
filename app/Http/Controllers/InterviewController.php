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
            'interview_date' => 'required|date|after:today',
            'interview_type' => 'required|string|max:255',
            'interview_link' => 'url|required',
            'interview_duration' => 'required',
            'interview_observation' => 'required|string|max:255',
        ], [
            'interview_date.after' => 'La fecha de la entrevista debe ser posterior a hoy',
            'interview_date.required' => 'La fecha de la entrevista es requerida',
            'interview_date.date' => 'La fecha de la entrevista debe ser una fecha válida',
            'interview_link.url' => 'El link de la entrevista debe ser una url válida',
            'interview_link.required' => 'El link de la entrevista es requerido',
            'interview_type.required' => 'El tipo de entrevista es requerido',
            'interview_duration.required' => 'La duración de la entrevista es requerida',
            'interview_observation.required' => 'La observación de la entrevista es requerida',
        ]);

        $interview = Interviews::create($validateData);

        $interview->interviewer_name = $user->name . ' ' . $user->last_name;
        $interview->confirmation_date = $interview->created_at;
        $interview->status = 'approved';

        $interview->save();

        return redirect()->back()->with('success', 'Entrevista agendada satisfactoriamente');
    }
}
