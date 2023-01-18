<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(){
        return view("register");
    }

    public function create_user(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]
        );
        dd($request->all());
    }
}
