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

        return view('pages/auth/register');
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

        $token = $admin->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function showLogin(){
        return view('pages/auth/login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',

        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json(['message'=>'unauthorized'], 401);
        }
        $admin = Auth::user();
        $token = $admin->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'successfully logged out']);
    }
}
