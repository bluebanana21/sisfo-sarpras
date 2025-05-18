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
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'assigned_num' => 'required',
            'item_type_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
        ]);

        $imageName = time().'.'.$request->image_url->extension();
        $request->image_url->move(public_path('images'), $imageName);
        $item = new Item();

        $item->name = $request->name;

        $item->description = $request->description;

        $item->image_url = 'images/'.$imageName;

        $item->assigned_num = $request->assigned_num;

        $item->item_type_id = $request->item_type_id;

        $item->subcategory_id = $request->subcategory_id;

        $item->status = $request->status;

        $item->save();

        return response()->json(['item successfully created', 'item'=>$validated], 201);
    }

}
