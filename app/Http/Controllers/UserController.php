<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\json_decode;

class UserController extends Controller
{
    public function getAll(){
        $data = User::all();

        return response()->json(['Users' => $data], 200);
    }

    public function getById (Request $request, $id){
        $data = User::findOrFail($id);

        return response()->json(['User' => $data], 200);
    }

    public function createUser(Request $request){

        $validatedData = $request->validate([
            'name'=>['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'role' => ['required'],
            'class_code' => ['required'],
        ]);

        User::create($validatedData);

        return response()->json(['success' => $validatedData], 201);
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message'=>'user succesfully deleted']);
    }

    public function updateUser(Request $request, $id){
    // Validate input: optional but at least one required
    $validatedData = $request->validate([
        'name' => ['sometimes', 'string'],
        'email' => ['sometimes', 'email'],
        'password' => ['sometimes', 'string'],
        'role' => ['sometimes', 'string'],
        'class_code' => ['sometimes', 'string'],
    ]);

    if (empty($validatedData)) {
        return response()->json([
            'message' => 'At least one column of data must be provided.'
        ], 422);
    }

    if (isset($validatedData['password'])) {
        $validatedData['password'] = Hash::make($validatedData['password']);
    }

    $user = User::findOrFail($id);
    $user->update($validatedData);

    return response()->json([
        'message' => 'Successful update',
        'user' => $user
    ], 200);
    }

}
