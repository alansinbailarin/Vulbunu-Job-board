<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'min',
        'max',
        'job_id',
        'currency_id',
        'salary_type_id',
        'periodicity_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function salaryType()
    {
        return $this->belongsTo(SalaryType::class);
    }

    public function periodicity()
    {
        return $this->belongsTo(Periodicity::class);
    }
}
