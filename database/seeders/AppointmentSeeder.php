<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        // Create 20 appointments using the AppointmentFactory
        Appointment::factory(20)->create();
    }
}
