<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return Actor::factory(10)->create();
    }
}
