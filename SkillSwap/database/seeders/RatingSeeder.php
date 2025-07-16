<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matches = \App\Models\UserMatch::all();
        $users = \App\Models\User::all();
        foreach ($matches as $match) {
            for ($i = 0; $i < 2; $i++) {
                \App\Models\Rating::create([
                    'user_id' => $users->random()->id,
                    'match_id' => $match->id,
                    'rating' => rand(1, 5),
                    'comment' => 'Commentaire test ' . rand(1, 1000),
                ]);
            }
        }
    }
} 