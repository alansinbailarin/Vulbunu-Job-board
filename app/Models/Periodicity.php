<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodicity extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
    ];

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
