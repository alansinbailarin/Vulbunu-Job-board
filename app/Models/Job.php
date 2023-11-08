<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Uuid;

class Job extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable =
    [
        'uuid',
        'title',
        'slug',
        'description',
        'location',
        'clicks',
        'status',
        'user_id',
        'category_id',
        'seniority_id',
        'job_modality_id',
        'workday_id',
        'priority_id',
        'country_id',
        'state_id',
        'city_id',
        'apply_on',
        'extra_info',
        'color',
        'anonymous',
    ];

    protected $uuidVersion = 4;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relacion muchos a muchos
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function workday()
    {
        return $this->belongsTo(Workday::class);
    }

    public function seniority()
    {
        return $this->belongsTo(Seniority::class);
    }

    public function jobModality()
    {
        return $this->belongsTo(JobModality::class);
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function responsability()
    {
        return $this->hasMany(Responsability::class);
    }

    public function requirement()
    {
        return $this->hasMany(Requirement::class);
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

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
