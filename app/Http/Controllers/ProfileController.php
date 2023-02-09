<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function show()
    {
        $title = 'Profile User';
        $user = User::find(auth()->user()->id);
        return view('users.profile', compact('user', 'title'));
    }

    public function edit($id)
    {
        $title = 'Edit User';
        $user = User::find($id);
        return view('users.change_password', compact('user', 'title'));
    }

    public function update($id)
    {

        $user = request()->validate(['password' => 'required']);
        $user = User::find($id);
        $user->password = Hash::make(request()->password);
        $user->save();
        return redirect('/profile')->with('warning', 'Password User Berhasil Diubah!');
    }

    public function edit_image($id)
    {
        $title = 'Change Image';
        $user = User::find($id);
        return view('users.change_image', compact('user', 'title'));
    }
    public function update_image($id, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = User::find($id);
        if ($request->file('image')) {
            $oldImage = $image->image;
            Storage::delete($oldImage);
            $image->image = $request->file('image')->store('images/profile');
            $image->save();
            return redirect('/profile')->with('success', 'Foto Profil Berhasil Diubah!');
        }
        return redirect('/profile')->with('success', 'Foto Profil Tidak Diubah!');
    }
}
