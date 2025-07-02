<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    public function viewAboutUsPage(){
        return view('registered.about');
    }
    public function viewAboutUsPageForUnregistered(){
        return view('Unregistered.about');
    }
}
