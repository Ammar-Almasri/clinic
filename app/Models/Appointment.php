<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Add the cast for appointment_date
    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    protected $fillable = ['doctor_id', 'patient_id', 'appointment_date', 'reason'];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
