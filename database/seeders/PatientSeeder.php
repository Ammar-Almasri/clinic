<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        // Create 10 patients using the PatientFactory
        Patient::factory(10)->create();
    }
}
