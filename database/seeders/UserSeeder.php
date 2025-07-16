<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Compte admin par défaut
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@skillswap.com',
            'password' => bcrypt('password'), // Change ce mot de passe après la première connexion !
            'is_admin' => true,
        ]);
        // ... autres seeds utilisateurs ici ...
    }
}
