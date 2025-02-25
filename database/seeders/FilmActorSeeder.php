<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filmIds = DB::table('films')->pluck('id')->toArray();
        $actorIds = DB::table('actors')->pluck('id')->toArray();

        if (empty($filmIds) || empty($actorIds)) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('films_actors')->insert([
                'film_id' => $filmIds[array_rand($filmIds)],
                'actor_id' => $actorIds[array_rand($actorIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}