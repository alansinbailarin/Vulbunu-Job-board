<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Socialite;
use Str;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Throwable $th) {
            return redirect(route('login'));
        }
        // check if already exists
        $user = User::where('email', $socialUser->getEmail())->first();
        $fullName = $socialUser->getName(); // Por ejemplo, "John Doe"
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0]; // "John"
        $lastName = isset($nameParts[1]) ? $nameParts[1] : null;
        $username = $socialUser->getNickname();
        //if doesn's exist
        if (!$user) {
            // create user
            $user = User::create([
                'name' => $firstName,
                'last_name' => $lastName,
                'username' => $username,
                'avatar' => $socialUser->avatar,
                'email' => $socialUser->getEmail(),
                'password' => Hash::make(Str::random(7)),
            ]);
            // create socials for user
            $user->socials()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken
            ]);
        }
        // if user does exist
        $socials = Social::where('provider', $provider)
            ->where('user_id', $user->id)->first();
        //check if user doesn't have socials
        if (!$socials) {
            // add socials to user
            $user->socials()->create([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken
            ]);
        }
        // login user
        auth()->login($user);
        // redirect to the dashboard
        return redirect('/');
    }
}