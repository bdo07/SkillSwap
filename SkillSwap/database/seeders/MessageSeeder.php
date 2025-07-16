<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matches = \App\Models\UserMatch::all();
        $users = \App\Models\User::all();
        foreach ($matches as $match) {
            for ($i = 0; $i < 3; $i++) {
                \App\Models\Message::create([
                    'user_id' => $users->random()->id,
                    'match_id' => $match->id,
                    'content' => 'Message test ' . rand(1, 1000),
                ]);
            }
        }
    }
} 