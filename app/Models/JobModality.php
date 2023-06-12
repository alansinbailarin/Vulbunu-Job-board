<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobModality extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
