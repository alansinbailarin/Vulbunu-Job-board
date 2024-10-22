<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

    //Relacion muchos a muchos
    public function job()
    {
        return $this->belongsToMany(Job::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
