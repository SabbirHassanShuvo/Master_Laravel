<?php

namespace App\Http\Controllers\Web\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('backend.layouts.auth.login');
    }

    // Handle the login form submission
    public function login(Request $request) {}
}
