<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'payment_status',
        'payment_amount',
        'payment_currency',
        'payment_source',
        'payeer_country',
        'payeer_postal_code',
        'payeer_address',
        'soft_descriptor',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
