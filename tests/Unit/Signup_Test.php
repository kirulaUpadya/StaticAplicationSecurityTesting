<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\loginController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Signup_Test extends TestCase
{
    /**
     * A basic unit test example.
     */

     //Test whether signup route is accessible
    public function test_signup_route()
    {
        $response = $this->get(route('show.signup'));

        $response->assertStatus(200);
    }
     //Test whether the correct view is returned
    public function test_show_sign_up()
    {
        $controller = new loginController();

        $response = $controller->showSignUp();

        // Assert the correct view is returned
        $this->assertEquals('Unregistered.signup', $response->getName());
    }

    //Test whether registration happens with invalid data
    public function test_registration_invalid_data()
    {
        // Simulate a registration request with missing fields
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'invalid-email', 
            'password' => 'short',      
            'confirm-password' => 'mismatch', 
        ]);

        // Assert the user was not created in the database
        $this->assertDatabaseMissing('users', [
            'email' => 'invalid-email',
        ]);

        // Assert validation errors
        $response->assertSessionHasErrors(['email', 'password', 'confirm-password']);
    }

    
}
