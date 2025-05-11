<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function getAll(){
        $data = SubCategory::all();

        return response()->json(['categories' => $data], 200);
    }

    public function createSubcat (Request $request){
        $validatedData = $request->validate([
            'name'=>['required'],
            'category_id'=>['required'],
        ]);

        SubCategory::create($validatedData);

        return response()->json(['message'=>'succesfull', 'category'=>$validatedData], 201);
    }

    public function deleteSubcat (Request $request, $id){
        $category = SubCategory::find($id);
        $category->delete();

        return response()->json(['message'=> 'succesfully delete']);
    }

    public function updateSubcat (Request $request, $id){
         $validatedData = $request->validate([
            'name'=>['required'],
        ]);
        $category = SubCategory::find($id);
        $category->update($validatedData);
        return response()->json(['message'=>'succesfull update', 'category'=>$validatedData], 204);
    }


}
