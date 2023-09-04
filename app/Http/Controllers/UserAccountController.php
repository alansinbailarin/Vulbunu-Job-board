<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\JobModality;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jobModalities = JobModality::all();
        $genders = Gender::all();
        $skills = Skill::all();
        $userSkills = $user->skill()->get();

        return inertia('UserAccount/Index', [
            'jobModalities' => $jobModalities,
            'genders' => $genders,
            'skills' => $skills,
            'userSkills' => $userSkills
        ]);
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
            'slug' => 'required|min:3|alpha_dash|unique:users,slug,' . $user->id,
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'birthdate' => 'required|date|before:15 years ago',
            'about_me' => 'nullable|max:2000|string',
            'job_title' => 'nullable|max:100',
            'phone' => 'nullable|max:10|min:10',
            'linkedin' => 'nullable|url',
            'cv' => 'nullable|max:2048',
            'job_modality_id' => 'nullable|exists:job_modalities,id',
            'gender_id' => 'nullable|exists:genders,id',
            'looking_for_job' => 'nullable|boolean'
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
            'avatar.mimes' => 'El archivo debe ser una imagen jpeg o png',
            'avatar.max' => 'El archivo no debe pesar más de 1MB',
            'avatar.uploaded' => 'El archivo no es valido',
            'birthdate.required' => 'La fecha de nacimiento es un campo requerido',
            'birthdate.date' => 'La fecha de nacimiento debe ser válida',
            'birthdate.before' => 'No tienes la edad suficiente para registrarte en esta plataforma',
            'about_me.max' => 'La descripción debe tener menos de 1000 caracteres',
            'slug.min' => 'El slug es demasiado corto',
            'slug.unique' => 'El slug ya está en uso',
            'slug.alpha_dash' => 'El slug solo puede contener letras, números, guiones y guiones bajos',
            'job_title.max' => 'El puesto de trabajo debe tener menos de 100 caracteres',
            'phone.max' => 'El teléfono debe contener 10 caracteres',
            'phone.min' => 'El teléfono debe contener 10 caracteres',
            'linkedin.url' => 'El perfil de LinkedIn debe ser una URL válida',
            'cv.max' => 'El CV no debe pesar más de 1MB',
            'job_modality_id.exists' => 'El campo modalidad de trabajo debe contener una modalidad existente',
            'gender_id.exists' => 'El campo género debe contener un género existente',
            'looking_for_job.boolean' => 'El campo de busco trabajo debe ser booleano'
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();

            $filePath = 'avatars/' . $user->id . '/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            $user->avatar = Storage::disk('s3')->url($filePath);
        }

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $filename = $file->getClientOriginalName();

            $filePath = 'cvs/' . $user->id . '/' . $filename;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            $user->cv = Storage::disk('s3')->url($filePath);
        }

        $user->name = $validatedData['name'];
        $user->last_name = $validatedData['last_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->birthdate = $validatedData['birthdate'];
        $user->about_me = $validatedData['about_me'];
        $user->slug = $validatedData['slug'];
        $user->job_title = $validatedData['job_title'];
        $user->phone = $validatedData['phone'];
        $user->linkedin = $validatedData['linkedin'];
        $user->job_modality_id = $validatedData['job_modality_id'];
        $user->gender_id = $validatedData['gender_id'];
        $user->looking_for_job = $validatedData['looking_for_job'];

        $user->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }

    public function deleteItem($itemToDelete)
    {
        $user = Auth::user();

        if ($itemToDelete == 'avatar') {
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

        if ($itemToDelete == 'cv') {
            $cvUrl = $user->cv;

            if ($cvUrl) {
                $fileParts = pathinfo($cvUrl);
                $filename = $fileParts['basename'];
                Storage::disk('s3')->delete('cvs/' . $user->id . '/' . $filename);
            }

            $user->cv = null;
            $user->save();

            return redirect()->route('user-account.index')->with('success', 'CV eliminado correctamente');
        }
    }
}
