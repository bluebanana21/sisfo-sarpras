<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemReturn;
use Illuminate\Http\Request;

class ItemReturnController extends Controller
{
    public function getAll(){
        $returns = ItemReturn::all();

        return view('pages.dashboard.returns.returns', compact('returns'));
    }

    public function getApi(){
        $returns = ItemReturn::all();

     return response()->json(['data'=>$returns]);
    }

    public function requestReturn(Request $request){
        $validated = $request->validate([
            'borrowing_id' => 'required',
            'return_status' => 'required',
        ]);

        ItemReturn::create($validated);

        return response()->json(['message'=>'request to return seuccesfully sent', 'data'=>$validated], 201);
    }

    public function confirmReturn($id, $itemId){
        $returnRequest = ItemReturn::find($id);

        $returnedItem = Item::where('id', $itemId)->update(['status'=> 'available']);

        $returnRequest->update(['return_status'=>'returned']);
        $returns = ItemReturn::all();

        return view('pages.dashboard.returns.returns', compact('returns'));


    }

    public function lateReturn($id, $itemId){
        $returnRequest = ItemReturn::find($id);
        $returnRequest->update(['return_status'=>'late']);
        $returns = ItemReturn::all();
$returnedItem = Item::where('id', $itemId)->update(['status'=> 'damaged']);

        return view('pages.dashboard.returns.returns', compact('returns'));

    }

    public function lostReturn($id, $itemId){
        $returnRequest = ItemReturn::find($id);
        $returnRequest->update(['return_status'=>'lost']);

        $returns = ItemReturn::all();
$returnedItem = Item::where('id', $itemId)->update(['status'=> 'damaged']);

        return view('pages.dashboard.returns.returns', compact('returns'));

    }

    public function damagedReturn($id, $itemId){
        $returnRequest = ItemReturn::find($id);
        $returnRequest->update(['return_status'=>'damaged']);
        $returns = ItemReturn::all();

        $returnedItem = Item::where('id', $itemId)->update(['status'=> 'damaged']);

        return view('pages.dashboard.returns.returns', compact('returns'));

    }

}
