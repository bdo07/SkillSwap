<?php

namespace Tests\Feature;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    public function test_skills_index_is_accessible()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/skills');
        $response->assertStatus(200);
    }

    public function test_user_can_create_skill()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/skills', [
            'name' => 'Test Skill',
            'description' => 'Description',
        ]);
        $response->assertRedirect('/skills');
        $this->assertDatabaseHas('skills', ['name' => 'Test Skill']);
    }

    public function test_user_can_edit_and_update_skill()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $skill = Skill::create(['name' => 'Old', 'description' => 'Old']);
        $response = $this->put('/skills/' . $skill->id, [
            'name' => 'New',
            'description' => 'New desc',
        ]);
        $response->assertRedirect('/skills');
        $this->assertDatabaseHas('skills', ['name' => 'New']);
    }

    public function test_user_can_delete_skill()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $skill = Skill::create(['name' => 'ToDelete', 'description' => '']);
        $response = $this->delete('/skills/' . $skill->id);
        $response->assertRedirect('/skills');
        $this->assertDatabaseMissing('skills', ['id' => $skill->id]);
    }
} 