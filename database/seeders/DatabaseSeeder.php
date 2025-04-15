<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the individual seeders
        $this->call([
            PatientSeeder::class,
            DoctorSeeder::class,
            AppointmentSeeder::class,
        ]);
    }
}
