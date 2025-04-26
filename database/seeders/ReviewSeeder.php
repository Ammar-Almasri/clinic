<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        // Create 10 random reviews using the ReviewFactory
        Review::factory(10)->create();
    }
}
