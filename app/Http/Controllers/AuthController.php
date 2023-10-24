<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ], [
            'email.required' => 'E-mail field is required',
            'email.email' => 'E-mail field must be a valid e-mail address',
            'password.required' => 'Password field is required',
        ]), true)) {
            throw ValidationException::withMessages([
                'sessionError' => 'The provided credentials do not match any record'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
