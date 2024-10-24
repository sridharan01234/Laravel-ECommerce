<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        if(!auth()->check())
        {
            return redirect('login');
        }

        return view('home', [
            'user' => auth()->user(),
            'products' => Product::all()
        ]);
    }
}
