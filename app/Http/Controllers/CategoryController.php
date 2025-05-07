<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class CategoryController extends Controller
{
    public function getCategory(){
        $data = Category::all();

        return response()->json(['categories' => $data], 200);
    }

    public function createCategory(Request $request){
        $validatedData = $request->validate([
            'name'=>['required'],
            'category_id' => ['required'],
        ]);

        Category::create($validatedData);
    }
}
