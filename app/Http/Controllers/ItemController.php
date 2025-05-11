<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getAll(){
        $items = Item::all();

        return response()->json(['message'=>'items successfully fetched', 'items' => $items], 200);

    }

    public function createItems(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'assigned_num' => 'required',
            'item_type_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
        ]);

        Item::create($validated);

        return response()->json(['item successfully created', 'item'=>$validated], 201);
    }

}
