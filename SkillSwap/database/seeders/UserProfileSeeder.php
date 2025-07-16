<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (\App\Models\User::all() as $user) {
            \App\Models\UserProfile::create([
                'user_id' => $user->id,
                'bio' => 'Bio de ' . $user->name,
                'photo' => null,
            ]);
        }
    }
} 