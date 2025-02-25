<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('actors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'birthdate' => $faker->date,
                'country' => $faker->country,
                'img_ur' => $faker->imageUrl(400, 600, 'people'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
