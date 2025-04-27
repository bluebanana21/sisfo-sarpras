<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use function Illuminate\Log\log;

class AuthController extends Controller
{
    public function showRegister(){

        return view('auth/register');
    }

    public function register(Request $request)
    {

    logger('Register called');

    $request->validate([
        'username' => 'required|string|unique|max:255',
        'email' => 'required|string|email|unique|max:255',
        'password' => 'required|string',
    ]);

    logger('Validation passed');

    $admin = Admin::create([
        'username'=> $request->username,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        'role' => 'admin',
    ]);

    logger('Admin created', ['admin' => $admin]);

    return response()->json(['message' => 'Admin successfully registered'], 201);
    }
}
