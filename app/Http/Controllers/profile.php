<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthenticateSessionController;

class profile extends Controller
{
    public function viewProfile(){
        return view("Registered.profile");
    }

    function updateProfile(Request $req){

        $req->validate([
            'name'  => 'required|string|max:255',
            'current_password'  => 'nullable|min:12',
            'new_password' => 'nullable|min:12',
            'confirm_new_password' => 'nullable|same:new_password',

        ]);
        // Ensure both password fields are filled together
    if ($req->filled('new_password') xor $req->filled('confirm_new_password')) {
        return back()->withErrors(['new_password' => 'Please fill both new password and confirmation.']);
    }

        $user = User::where('email', session('email'))->first();
            // If user wants to change password, validate current password first
            if ($req->filled('new_password') && $req->filled('confirm_new_password')) {
                if (!$req->filled('current_password') || !Hash::check($req->current_password, $user->password)) {
                    return back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
                }

                $user->password = Hash::make($req->new_password);
            }

    $user->name = $req->name;
    $user->save();
    session(['name' => $user->name]);

        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully!');

}
}
