<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        // Create 5 doctors using the DoctorFactory
        Doctor::factory(5)->create();
    }
}
