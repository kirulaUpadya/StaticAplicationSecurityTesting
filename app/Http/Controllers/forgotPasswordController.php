<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class forgotPasswordController extends Controller
{
    public function viewForgotPasswordPage(){

        return view('Unregistered.forgotPassword');
    }




    function forgetPasswordPost(Request $request){
        $request->validate([
            'email'=>"required|email|exists:users",
        ]
        );

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()

        ]);

        Mail::send('emails.forget-password', ['token'=>$token], function ($message) use ($request) {

            $message->to($request->email);
            $message->Subject("Reset Password");


        });

        return redirect()->to(route('show.forgotpasswordpage'))->with("success", "We have sent an email to reset your password");





    }
    function resetPassword($token){
        return view('unregistered.resetPassword', compact('token'));


    }

    function resetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:10",
            "confirmPassword" => "required|same:password"
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();

            if(!$updatePassword){
                return redirect()->route('reset.password', ['token' => $request->token])->with("error", "Invalid token or email.");


            }

            User::where("email", $request->email)->update(["password" =>Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(["email" => $request->email])->delete();

            return redirect()->to(route('login'))->with("success", "Password resetting was successful. Log in now");

    }
}


