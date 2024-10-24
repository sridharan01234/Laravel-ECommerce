<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (auth()->check()) {
            return view(
                'admin.dashboard',
                [
                    'user' => auth()->user(),
                    'users' => $users
                ]
            );
        }
        return redirect(route('login'));
    }
}