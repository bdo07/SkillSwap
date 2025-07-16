<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $skills = [
            'Programmation', 'Photographie', 'Cuisine', 'Musique', 'Peinture',
            'Jardinage', 'Langues', 'Écriture', 'Mathématiques', 'Danse'
        ];
        foreach ($skills as $name) {
            \App\Models\Skill::create([
                'name' => $name,
                'description' => 'Description pour ' . $name,
            ]);
        }
    }
} 