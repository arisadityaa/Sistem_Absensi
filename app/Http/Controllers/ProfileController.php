<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show(){
        $title = 'Profile User';
        $user = User::find(auth()->user()->id);
        return view('users.profile', compact('user', 'title'));
    }

    public function edit($id){
        $title = 'Edit User';
        $user = User::find($id);
        return view('users.change_password', compact('user', 'title'));
    }

    public function update($id){
        $user = User::find($id);
        $user->password = request()->validate(['password'=>'required']);
        $user -> save();
        return redirect('/profile')->with('warning', 'Password User Berhasil Diubah!');
    }
}
