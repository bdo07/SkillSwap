<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@skillswap.com',
            'is_admin' => true,
            'suspended' => false,
        ]);
        \App\Models\User::factory(9)->create([
            'is_admin' => false,
            'suspended' => false,
        ]);
    }
} 