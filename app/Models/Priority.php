<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
