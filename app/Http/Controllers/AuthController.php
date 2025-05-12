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
        $validated = $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',

        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard/overview');
        }

        return back()->with('loginErrpr', 'Login Failed!');

     }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['message'=>'successfully logged out']);
    }
}
