<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function authenticate(){
        $credentials = request()->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/')->with('info', 'User Berhasil Login');
        }

        return redirect()->back()->with('danger', 'Invalid User Login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
