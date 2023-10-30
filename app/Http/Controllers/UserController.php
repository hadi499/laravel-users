<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user
        ]);
    }
    public function update(Request $request)
    {
        $rules1 = [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'profile' => 'image|file|max:1024',

        ];
        $rules2 = [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255',
            'profile' => 'image|file|max:1024',

        ];


        if ($request->email == auth()->user()->email) {
            $validatedData = $request->validate($rules2);
        } else {
            $validatedData = $request->validate($rules1);
        }
        if ($request->file('profile')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['profile'] = $request->file('profile')->store('profile-images');
        }


        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('dashboard')->with('success', 'Updated is success!');
    }

    public function editPassword()
    {
        return view('dashboard.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|min:5|max:255|confirmed',

        ];
        $validateData = $request->validate($rules);
        $validateData['password'] = Hash::make($validateData['password']);

        User::where('id', auth()->user()->id)->update($validateData);

        return redirect('dashboard')->with('success', 'Updated is success!');
    }
}
