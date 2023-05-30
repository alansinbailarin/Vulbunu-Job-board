<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'slug',
        'description',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
