<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'provider_id',
        'provider_token',
        'provider_refresh_token',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
