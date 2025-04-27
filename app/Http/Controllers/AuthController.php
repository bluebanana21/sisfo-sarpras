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

    $request->validate([
        'username' => 'required|string|unique:admins,username|max:255',
        'email' => 'required|email|unique:admins,email|max:255',
        'password' => 'required|string',
    ]);

    $admin = Admin::create([
        'username'=> $request->username,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        'role' => 'admin',
        ]);

        echo("shit worked fam");

    return response()->json(['message' => 'Admin successfully registered'], 201);
    }

    public function showLogin(){
        return view('auth/login');
    }

    public function login(Request $request){
    }

    public function logout(){
    }
}
