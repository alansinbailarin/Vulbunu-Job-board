<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;

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
                return redirect()->back()->with('success', 'Ya haz aplicado antes a la vacante');
            } else {
                // El perfil no ha sido compartido antes, crea un nuevo registro
                Applicant::create([
                    'user_id' => $user->id,
                    'job_id' => $jobId,
                    'status' => 'pending'
                ]);

                return redirect()->back()->with('success', 'Haz aplicado satisfactoriamente');
            }
        } else {
            return redirect()->back()->with('success', 'Debes iniciar sesión para compartir tu perfil');
        }
    }

    public function myApplications()
    {
        $user = auth()->user();

        if ($user) {
            $oneWeekAgo = Carbon::now()->subWeek();

            // Graficamos nuestras aplicaciones de la última semana
            $lastWeekApplications = Applicant::where('user_id', $user->id)
                ->where('created_at', '>=', $oneWeekAgo)
                ->count();

            $lastWeekPendingApps = Applicant::where('user_id', $user->id)
                ->where('created_at', '>=', $oneWeekAgo)
                ->where('status', 'pending')
                ->count();

            $lastWeekApprovedApps = Applicant::where('user_id', $user->id)
                ->where('created_at', '>=', $oneWeekAgo)
                ->where('status', 'approved')
                ->count();

            $lastWeekRejectedApps = Applicant::where('user_id', $user->id)
                ->where('created_at', '>=', $oneWeekAgo)
                ->where('status', 'rejected')
                ->count();

            $jobs = Job::whereHas('applicant', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('status', 'published')
                ->with([
                    'applicant' => function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    },
                    'applicant.interviews', // Carga la relación 'interviews' de los solicitantes
                    'user',
                    'category',
                ])->get();

            $pendingAppsCount = Applicant::where('user_id', $user->id)
                ->where('status', 'pending')
                ->count();

            $approvedAppsCount = Applicant::where('user_id', $user->id)
                ->where('status', 'approved')
                ->count();

            $totalAppsCount = Applicant::where('user_id', $user->id)
                ->count();

            $rejectedAppsCount = Applicant::where('user_id', $user->id)
                ->where('status', 'rejected')
                ->count();

            // Calcula el porcentaje
            $percentajeTotalLastWeek = $lastWeekApplications;
            $percentajePendingLastWeek = $lastWeekPendingApps;
            $percentajeApprovedLastWeek = $lastWeekApprovedApps;
            $percentajeRejectedLastWeek = $lastWeekRejectedApps;

            // Calcular porcentaje total de las aplicaciones que no sea semanal
            $percentajeTotal = ($totalAppsCount / $totalAppsCount) * 100;
            $percentajePending = ($pendingAppsCount / $totalAppsCount) * 100;
            $percentajeApproved = ($approvedAppsCount / $totalAppsCount) * 100;
            $percentajeRejected = ($rejectedAppsCount / $totalAppsCount) * 100;

            $totalCount = $totalAppsCount;
            $pendingCount = $pendingAppsCount;
            $approvedCount = $approvedAppsCount;
            $rejectedCount = $rejectedAppsCount;


            return inertia('User/MyApplications', [
                'jobs' => $jobs,
                'totalAppsCount' => $totalAppsCount,
                'pendingAppsCount' => $pendingAppsCount,
                'approvedAppsCount' => $approvedAppsCount,
                'percentajeTotalLastWeek' => $percentajeTotalLastWeek,
                'percentajePendingLastWeek' => $percentajePendingLastWeek,
                'percentajeApprovedLastWeek' => $percentajeApprovedLastWeek,
                'percentajeRejectedLastWeek' => $percentajeRejectedLastWeek,
                'rejectedAppsCount' => $rejectedAppsCount,
                'percentajeTotal' => $percentajeTotal,
                'percentajePending' => $percentajePending,
                'percentajeApproved' => $percentajeApproved,
                'percentajeRejected' => $percentajeRejected,
                'totalCount' => $totalCount,
                'pendingCount' => $pendingCount,
                'approvedCount' => $approvedCount,
                'rejectedCount' => $rejectedCount,
            ]);
        } else {
            return redirect()->back()->with('success', 'Debes iniciar sesión para ver tus aplicaciones');
        }
    }
}
