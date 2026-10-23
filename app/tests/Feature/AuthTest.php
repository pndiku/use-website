<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    private function makeUser(string $role, string $password = 'secret-password'): User
    {
        $user = new User();
        $user->name = ucfirst($role) . ' Tester';
        $user->email = strtolower($role) . '-' . uniqid() . '@example.test';
        $user->password = Hash::make($password);
        $user->role = $role;
        $user->save();

        return $user;
    }

    public function test_admin_can_log_in_with_password()
    {
        $user = $this->makeUser('Admin');

        $this->post('/login', ['email' => $user->email, 'password' => 'secret-password'])
            ->assertRedirect('/manage');
        $this->assertAuthenticatedAs($user);

        $this->get('/manage')->assertOk();
    }

    public function test_wrong_password_is_rejected()
    {
        $user = $this->makeUser('Admin');

        $this->post('/login', ['email' => $user->email, 'password' => 'wrong'])
            ->assertSessionHas('failed');
        $this->assertGuest();
    }

    public function test_login_is_rate_limited()
    {
        $user = $this->makeUser('Admin');

        for ($i = 0; $i < 10; $i++) {
            $this->post('/login', ['email' => $user->email, 'password' => 'wrong']);
        }

        $this->post('/login', ['email' => $user->email, 'password' => 'wrong'])->assertStatus(429);
    }

    public function test_logout_is_post_only()
    {
        $this->actingAs($this->makeUser('Admin'));

        $this->get('/logout')->assertStatus(405);
        $this->post('/logout')->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_google_redirect_sets_state()
    {
        config(['app.debug' => false]);
        putenv('GOOGLE_CLIENT_ID=test-client');
        putenv('GOOGLE_REDIRECT_URI=http://localhost/auth/google/callback');

        $response = $this->get('/auth/google');

        $state = session('google_oauth_state');
        $this->assertSame(40, strlen($state));
        $this->assertStringContainsString('state=' . $state, $response->headers->get('Location'));
    }

    public function test_google_callback_rejects_bad_state()
    {
        $this->get('/auth/google/callback?code=abc')
            ->assertRedirect('/login')
            ->assertSessionHas('failed');

        $this->withSession(['google_oauth_state' => 'expected'])
            ->get('/auth/google/callback?code=abc&state=forged')
            ->assertRedirect('/login')
            ->assertSessionHas('failed');

        $this->assertGuest();
    }
}
