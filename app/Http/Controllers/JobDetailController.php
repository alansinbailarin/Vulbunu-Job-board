<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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
}
