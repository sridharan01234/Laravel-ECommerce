<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        return redirect(route('home'));
        }

        return redirect()->back()->withErrors('Invalid credentials');

    }

    public function register(Request $request, User $user)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
                'name' => 'required',
            ]
        );

        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->name = $request->input('name');

        $user->save();

        $this->index();

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
