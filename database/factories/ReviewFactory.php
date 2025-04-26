<?php
namespace Database\Factories;

use App\Models\Review;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::inRandomOrder()->first()->id, // Random patient
            'doctor_id'  => Doctor::inRandomOrder()->first()->id,  // Random doctor
            'rating'     => $this->faker->numberBetween(1, 5),     // Random rating
            'comment'    => $this->faker->sentence,                // Random comment
        ];
    }
}
