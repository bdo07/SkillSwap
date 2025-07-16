<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserMatch;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessagingTest extends TestCase
{
    use RefreshDatabase;

    public function test_chat_page_accessible()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $match = UserMatch::create(['user1_id' => $user1->id, 'user2_id' => $user2->id, 'status' => 'pending']);
        $this->actingAs($user1);
        $response = $this->get('/messages/' . $match->id);
        $response->assertStatus(200);
    }

    public function test_user_can_send_message()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $match = UserMatch::create(['user1_id' => $user1->id, 'user2_id' => $user2->id, 'status' => 'pending']);
        $this->actingAs($user1);
        $response = $this->post('/messages/' . $match->id, [
            'content' => 'Hello world',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('messages', [
            'user_id' => $user1->id,
            'match_id' => $match->id,
            'content' => 'Hello world',
        ]);
    }
} 