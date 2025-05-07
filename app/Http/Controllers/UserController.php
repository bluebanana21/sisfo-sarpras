<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class UserController extends Controller
{
    public function getUser(){
        $data = User::all();

        return response()->json(['categories' => $data], 200);
    }

    public function createUser(Request $request){

        $validatedData = $request->validate([
            'username'=>['required|unique:users'],
            'email' => ['required|email|unique:users'],
            'password' => ['required'],
            'role' => ['required'],
            'class_id' => ['required'],
        ]);

        User::create($validatedData);

        return response()->json(['success' => $validatedData], 201);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return response()->json(['message'=>'user succesfully deleted']);
    }
}
