<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::inRandomOrder()->first()->id, // Select a random patient
            'doctor_id' => Doctor::inRandomOrder()->first()->id,   // Select a random doctor
            'appointment_date' => $this->faker->dateTimeThisYear(), // Random date for the appointment
        ];
    }
}
