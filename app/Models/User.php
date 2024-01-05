<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function PHPSTORM_META\map;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'username',
        'slug',
        'job_title',
        'avatar',
        'cover_photo',
        'email',
        'email_verified_at',
        'password',
        'looking_for_job',
        'phone',
        'about_me',
        'linkedin',
        'birthdate',
        'cv',
        'job_modality_id',
        'gender_id',
        'country_id',
        'state_id',
        'city_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function language()
    {
        return $this->belongsToMany(Language::class);
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function jobModality()
    {
        return $this->belongsTo(JobModality::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }
}
