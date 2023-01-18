<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function home(){
        return view('index');
    }

    public function demo(){
        return view('demo');
    }

    public function register(){
        return view('register');
    }
}
