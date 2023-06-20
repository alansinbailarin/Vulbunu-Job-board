<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $lastName = $request->input('last_name');
        $baseUsername = $name . $lastName;
        $username = $baseUsername . rand(1, 9999);

        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . rand(1, 9999);
        }

        $validatedData = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'string|unique:users',
            'slug' => 'string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8|confirmed|string'
        ]);

        $username = strtolower(str_replace(' ', '', $username));
        $slug = $username;

        $user = User::make($validatedData);
        $user->username = $username;
        $user->slug = $slug;
        $user->save();

        Auth::login($user);

        return redirect('/');
    }
}
