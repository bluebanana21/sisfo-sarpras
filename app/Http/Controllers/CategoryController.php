<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class CategoryController extends Controller
{
    public function getAll(){
        $data = Category::all();

        return response()->json(['categories' => $data], 200);
    }

    public function createCat(Request $request){
        $validatedData = $request->validate([
            'name'=>['required'],
        ]);

        Category::create($validatedData);

        return redirect()->route('categories');
    }

    public function deleteCat(Request $request, $id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories');
    }

    public function updateCat(Request $request, $id){
         $validatedData = $request->validate([
            'name'=>['sometimes', 'string'],
        ]);

        if (empty($validatedData)) {
            return response()->json([
                'message' => 'At least one column of data must be provided.'
            ], 422);
        }

        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return redirect()->route('categories');
    }

}
