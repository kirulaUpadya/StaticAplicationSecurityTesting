<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthenticateSessionController;


class loginController extends Controller
{
    function showSignUp(){
        return view('Unregistered.signup');
    }
    function viewHomePage(){
        return view('Registered.homepage');
    }
    function viewHomePageForUnregistered(){

        return view('Unregistered.home');
    }


    public function registerPost(Request $req)
            {
                // Validate the request to ensure all necessary fields are provided
                $req->validate([
                    'name'  => 'required|string|max:255',
                    'email'     => 'required|email|unique:users',
                    'password'  => 'required|min:12',
                    'confirm-password' => 'required|same:password',
                ]);


                $newUserID = str_pad(User::count() + 1, 4, '0', STR_PAD_LEFT);
                $data2 = [
                    'password'  => Hash::make($req->password),
                    "role" => "customer",
                    "email" => $req->email,
                    "user_id" => $newUserID,
                    "name" => $req->name,


                ];
                $user = User::create($data2);
                $newCustomerID = 'C' . str_pad(Customer::count() + 1, 4, '0', STR_PAD_LEFT);


                $data = [
                  "customer_ID" => $newCustomerID,
                  "name" => $req->name,
                  "email" => $req->email,



                    // Hash the password before saving
                ];
                $customer = Customer::create($data);




                // Redirect with success or failure message
                if ($customer) {
                    return redirect(route('login'))->with('success', 'Registration successful!');
                } else {
                    return redirect(route('show.signup'))->with('error', 'Registration failed, please try again.');
                }

            }
            public function loginPost(Request $req)
            {
                //validating the input fields
                $req->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                // Attempt login
                if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                    $req->session()->regenerate();

                    // Save user information in the session
                    $user = Auth::user();
                    $req->session()->put('email', $user->email);
                    $req->session()->put('user_type', $user->role);
                    $req->session()->put('name', $user->name);



                    // Redirect based on each User_type according to their respective pages
                    switch ($user->role) {
                        case 'customer':
                            return redirect()->intended(route('home'));
                        // case 'Admin':
                        //     return redirect()->intended(route('admin.login'));

                }
            }
                //if details are not valid redirect back to the login page with an error
                return redirect(route('login'))->with('error', 'Login details are not valid. Try again');
            }
            function logout()
            {
                Auth::logout();
                Session::invalidate(); // Clears the session
                // Session::regenerateToken(); // Regenerate CSRF token for security

                return redirect(route('login'));
            }

}
