<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        Log::info('Google User Data:', ['googleUser' => $googleUser]);

        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => \Hash::make(rand(100000, 999999))
            ]);
            Log::info('New User Created:', ['user' => $user]);
        } else {
            Log::info('User Found:', ['user' => $user]);
        }

        Auth::login($user);
        Log::info('User Logged In:', ['user' => $user]);

        return redirect('login');
    }
}