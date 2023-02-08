<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }

    public function store(){
        $user = request()->validate(
            [
                'username' => 'required|unique:users|max:15',
                'email' => 'required|unique:users',
                'password' => 'required'
            ]);
        $user = new User;
        $user-> username = request()->username;
        $user-> email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->save();
        return redirect('/login')->with('info', 'Berhasil Daftar, Silahkan Login!');
    }
}
