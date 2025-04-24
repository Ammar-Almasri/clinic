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

    public function scopeSpeciality(Builder $query, $speciality):Builder{
        return $query->where('speciality', 'like', '%' . $speciality . '%');
    }
}
