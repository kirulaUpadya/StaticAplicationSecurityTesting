<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\table_contact;

class contactUsController extends Controller
{
    public function viewContactUsPage(){
        return view('registered.contact');
    }
    public function viewContactUsPageForUnregistered(){
        return view('Unregistered.contact');
    }

    public function contactUs(Request $req){  //function for contact us feature in the system
        $req ->validate([   // for validating the user inputs
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'message' => 'required',


        ]);

        $data =[
            'name' => $req->name,
            'email' => $req->email,
            'phone_number' => $req->phone_number,
            'message' => $req->message

        ];

        $table_contact = table_contact::create($data); //to store in the database


        if($table_contact){
            return back()->with('success', 'Your response is submitted. We will contact you soon'); //if contact is submitted it redirects back with a success message

        }
        else{
            return back()->with('error', 'Your response is not submitted. Please try again'); //if it is not submitted it redirects back with error message
        }






    }



}
