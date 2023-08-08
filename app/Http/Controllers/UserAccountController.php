<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Termwind\Components\Dd;

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

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'username' => 'string|min:3|unique:users,username,' . $user->id,
            'slug' => 'string|min:3|unique:users,slug,' . $user->id,
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1024',
            'birthdate' => 'required|date|before:15 years ago',
            'about_me' => 'string|max:1000',
        ], [
            'name.required' => 'El nombre es un campo requerido',
            'name.min' => 'El nombre es demasiado corto',
            'last_name.required' => 'El apellido es un campo requerido',
            'last_name.min' => 'El apellido es demasiado corto',
            'username.min' => 'El nombre de usuario es demasiado corto',
            'username.unique' => 'El nombre de usuario ya está en uso',
            'email.required' => 'El correo electrónico es un campo requerido',
            'email.email' => 'El correo electrónico debe ser válido',
            'email.unique' => 'El correo electrónico ya está en uso',
            'avatar.image' => 'El archivo debe ser una imagen',
            'avatar.mimes' => 'El archivo debe ser una imagen jpeg o png',
            'avatar.max' => 'El archivo no debe pesar más de 1MB',
            'avatar.uploaded' => 'El archivo no es valido',
            'birthdate.required' => 'La fecha de nacimiento es un campo requerido',
            'birthdate.date' => 'La fecha de nacimiento debe ser válida',
            'birthdate.before' => 'No tienes la edad suficiente para registrarte en esta plataforma',
            'about_me.max' => 'La descripción debe tener menos de 1000 caracteres',
        ]);


        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();

            $filePath = 'avatars/' . $user->id . '/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            $user->avatar = Storage::disk('s3')->url($filePath);
        }

        $user->name = $validatedData['name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->birthdate = $validatedData['birthdate'];
        $user->about_me = $validatedData['about_me'];

        $user->slug = $user->username;

        $user->save();

        return redirect()->route('talents.show', $user->slug)->with('success', 'Perfil actualizado correctamente');
    }

    public function deleteImage()
    {
        $user = Auth::user();

        $avatarUrl = $user->avatar;

        if ($avatarUrl) {
            $fileParts = pathinfo($avatarUrl);
            $filename = $fileParts['basename'];
            Storage::disk('s3')->delete('avatars/' . $user->id . '/' . $filename);
        }

        $user->avatar = null;
        $user->save();

        return redirect()->route('user-account.index')->with('success', 'Imagen eliminada correctamente');
    }
}
