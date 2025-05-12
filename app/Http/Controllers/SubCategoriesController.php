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

        return redirect()->route('subcategories');
    }

    public function deleteSubcat (Request $request, $id){
        $category = SubCategory::find($id);
        $category->delete();

        return response()->json(['message'=> 'succesfully delete']);
    }

    public function updateSubcat (Request $request, $id){
    // Validate input: optional but at least one required
    $validatedData = $request->validate([
        'name' => ['sometimes', 'string'],
        'category_id' => ['sometimes', 'integer'],
    ]);

    // Check if both fields are missing
    if (empty($validatedData)) {
        return response()->json([
            'message' => 'At least one of name or category_id must be provided.'
        ], 422); // Unprocessable Entity
    }

    $category = SubCategory::findOrFail($id);
    $category->update($validatedData);

    return response()->json([
        'message' => 'Successful update',
        'category' => $category
    ], 200);
    }

}
