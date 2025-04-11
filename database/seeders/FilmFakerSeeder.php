<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return Film::factory(10)->create();
    }
}
