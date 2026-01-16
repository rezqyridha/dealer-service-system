<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_accessible(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register_page_accessible(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_admin_can_access_technicians(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/technicians');

        $response->assertStatus(200);
    }

    public function test_advisor_cannot_access_technicians(): void
    {
        $advisor = User::factory()->create(['role' => 'advisor']);

        $response = $this->actingAs($advisor)->get('/technicians');

        $response->assertStatus(403);
    }

    public function test_admin_can_access_customers(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/customers');

        $response->assertStatus(200);
    }

    public function test_advisor_can_access_customers(): void
    {
        $advisor = User::factory()->create(['role' => 'advisor']);

        $response = $this->actingAs($advisor)->get('/customers');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_cannot_access_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }
}
