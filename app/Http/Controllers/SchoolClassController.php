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

        return redirect()->route('classes');

    }

    public function deleteClasses($class_code){
        $data = SchoolClass::find($class_code);

        $data->delete();

        return redirect()->route('classes');
    }
}
