<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function index()
    {
        return inertia('UserAccount/Index');
    }

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

        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'last_name' => 'required|string',
                'username' => 'string|unique:users',
                'slug' => 'string|unique:users',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|min:8|confirmed|string'
            ],
            [
                'name.required' => 'El nombre es un campo requerido',
                'last_name.required' => 'El apellido es un campo requerido',
                'email.required' => 'El correo electrónico es un campo requerido',
                'email.email' => 'El correo electrónico debe ser válido',
                'email.unique' => 'El correo electrónico ya está en uso',
                'password.required' => 'La contraseña es un campo requerido',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden',
            ]
        );

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
