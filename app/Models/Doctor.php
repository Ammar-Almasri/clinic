<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'speciality'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSpeciality(Builder $query, $speciality):Builder
    {
        return $query->where('speciality', 'like', '%' . $speciality . '%');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query->withAvg('reviews','rating')
        ->orderBy('reviews_avg_rating','desc');
    }
}
