<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatchingTest extends TestCase
{
    use RefreshDatabase;

    public function test_matching_index_accessible()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/matching');
        $response->assertStatus(200);
    }

    public function test_user_can_propose_match()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $this->actingAs($user1);
        $response = $this->post('/matching/' . $user2->id);
        $response->assertRedirect('/matching');
        $this->assertDatabaseHas('user_matches', [
            'user1_id' => $user1->id,
            'user2_id' => $user2->id,
        ]);
    }
} 