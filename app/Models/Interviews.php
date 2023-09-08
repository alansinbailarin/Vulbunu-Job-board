<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'interviewer_name',
        'interview_date',
        'interview_type',
        'interview_link',
        'interview_duration',
        'interview_observation',
        'interview_feedback',
        'confirmation_date',
        'status',
        'applicant_id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
