<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\User;

class ApplicantController extends Controller
{
    public function shareProfile()
    {
        $user = auth()->user();
        $jobId = request()->input('job_id');

        if ($user) {
            // Verificar si el perfil ya ha sido compartido anteriormente
            $existingApplicant = Applicant::where('user_id', $user->id)
                ->where('job_id', $jobId)
                ->first();

            if ($existingApplicant) {
                return redirect()->back()->with('success', 'Tu perfil ya fue compartido antes.');
            } else {
                // El perfil no ha sido compartido antes, crea un nuevo registro
                Applicant::create([
                    'user_id' => $user->id,
                    'job_id' => $jobId
                ]);

                return redirect()->back()->with('success', 'Perfil compartido con el anunciante!');
            }
        } else {
            return redirect()->back()->with('success', 'Debes iniciar sesión para compartir tu perfil!');
        }
    }
}
