<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect('/dashboard');
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_users_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/dashboard');
    }

    public function test_users_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/logout');
        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_protected_route_requires_authentication()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }
} 