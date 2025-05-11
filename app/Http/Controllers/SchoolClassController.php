<?php
namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function getAll(){
        $classes = SchoolClass::all();

        return response()->json(['message'=>'succesfully fetched classes', 'classes' => $classes], 200);
    }

    public function createClasses(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'class_code' => 'required'
        ]);

        SchoolClass::create($validated);

        return response()->json(['item successfully created', 'item'=>$validated], 201);

    }

    public function deleteClasses($id){
        $data = SchoolClass::find($id);

        $data->delete();

        return response()->json(['class succesfully deleted'=>$data],  200);
    }
}
