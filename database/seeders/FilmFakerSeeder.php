<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence(3),
                'year' => $faker->year,
                'genre' => $faker->randomElement(["Terror", "Comedia", "Accion", "Suspense", "Ciencia Ficcion", "Romance"]),
                'country' => $faker->country,
                'duration' => $faker->numberBetween(90, 180),
                'img_ur' => $faker->imageUrl(400, 600, 'movies'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
