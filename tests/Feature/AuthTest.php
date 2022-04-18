<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_login_successful_then_redirect_to_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user['email'],
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_unauth_user_cant_access_dashboard() 
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        $response->assertRedirect('/login');
    }

    public function test_guest_user_can_register()
    {
        $user = User::factory()->create();

        $response = $this->post('/register',[
            'name' => 'amogus',
            'email' => Str::random(5).$user['email'],
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_auth_user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public static function turu() 
    {

    }
}
