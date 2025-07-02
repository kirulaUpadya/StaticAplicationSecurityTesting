<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login_Test extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Define routes for testing
        $this->app['router']->post('/register', [\App\Http\Controllers\LoginController::class, 'registerPost'])->name('register.post');
        $this->app['router']->post('/login', [\App\Http\Controllers\LoginController::class, 'loginPost'])->name('login.post');
        $this->app['router']->post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
        $this->app['router']->get('/home', function () {
            return 'Home Page';
        })->name('home');
        $this->app['router']->get('/login', function () {
            return 'Login Page';
        })->name('login');
    }

    //Test whether login route is accessible
    public function test_login_route()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    // Test whether a user can log successfully
    public function test_user_login_successfully()
    {
        // Create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('SecurePassword123'),
        ]);

        // Simulate a login request
        $response = $this->post(route('login.user'), [
            'email' => 'testuser@example.com',
            'password' => 'SecurePassword123',
        ]);

        // Assert the session contains the correct user details
        $this->assertAuthenticatedAs($user);

        // Assert the response redirects to the homepage
        $response->assertRedirect(route('home'));
    }
    
    //Test login with invalid credentials
    public function test_login_with_invalid_credentials()
    {
        // Create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('SecurePassword123'),
        ]);

        // Simulate a login request with incorrect password
        $response = $this->post(route('login.user'), [
            'email' => 'testuser@example.com',
            'password' => 'WrongPassword',
        ]);

        // Assert the user is not authenticated
        $this->assertGuest();

        // Assert the response redirects back with an error message
        $response->assertRedirect(route('login'))
                 ->assertSessionHas('error', 'Login details are not valid. Try again');
    }
    
    //Test whether a user logout successfully
    public function test_user_logout_successfully()
    {
        // Create and authenticate a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('SecurePassword123'),
        ]);
        $this->actingAs($user);

        // Simulate a logout request
        $response = $this->get(route('log.out'));

        // Assert the user is logged out
        $this->assertGuest();

        // Assert the response redirects to the login page
        $response->assertRedirect(route('login'));
    }

}
