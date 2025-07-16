<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserMatch;
use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_rating_form_accessible()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $match = UserMatch::create(['user1_id' => $user1->id, 'user2_id' => $user2->id, 'status' => 'pending']);
        $this->actingAs($user1);
        $response = $this->get('/ratings/' . $match->id);
        $response->assertStatus(200);
    }

    public function test_user_can_submit_rating()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $match = UserMatch::create(['user1_id' => $user1->id, 'user2_id' => $user2->id, 'status' => 'pending']);
        $this->actingAs($user1);
        $response = $this->post('/ratings/' . $match->id, [
            'rating' => 5,
            'comment' => 'Excellent',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('ratings', [
            'user_id' => $user1->id,
            'match_id' => $match->id,
            'rating' => 5,
            'comment' => 'Excellent',
        ]);
    }
} 