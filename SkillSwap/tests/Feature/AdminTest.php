<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_non_admin_cannot_access_dashboard()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($user);
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    public function test_admin_can_suspend_and_delete_user()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create(['is_admin' => false]);
        $this->actingAs($admin);
        $response = $this->post('/admin/users/' . $user->id . '/suspend');
        $response->assertStatus(302);
        $user->refresh();
        $this->assertTrue($user->suspended);
        $response = $this->delete('/admin/users/' . $user->id);
        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
} 