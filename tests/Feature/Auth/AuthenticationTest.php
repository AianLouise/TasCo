<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_displays_login_view()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    public function test_store_authenticates_and_redirects_user()
    {
        $user = User::factory()->create([
            'email' => 'default@example.com',
            'password' => bcrypt($password = 'default-password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'default@example.com',
            'password' => 'default-password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/home');
    }

    public function test_destroy_logs_out_and_redirects_user()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout', [
            'password' => 'password', // assuming 'password' is the user's actual password
        ]);

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
