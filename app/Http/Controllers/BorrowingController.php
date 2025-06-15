<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    public function getAll(){
        $borrows = Borrowing::all();
        $userId = Auth::id();

        return view('pages.dashboard.borrowing.borrows', compact('borrows','userId'));

    }

    public function getAllApi(){
        $borrows = Borrowing::all();

        return response()->json(['message'=>'successfully fetched data', 'data'=>$borrows], 200);
    }

    public function getByItem($itemId){
        $borrowItem = Borrowing::where('item_id', $itemId)->get();

        return response()->json(['message'=>'successfully got by item id', 'data'=>$borrowItem], 200);
    }

    public function requestBorrow(Request $request){

        $validated = $request->validate([
            'borrower_id' => 'required',
            'item_id' => 'required',
            'reason' => 'required',
            'return_date' => 'required',
            'approval_status' => 'required',
            'ongoing_status' => 'nullable',
            'approved_by' => 'nullable'
        ]);

        Borrowing::create($validated);

        return response(['message' => 'borrowing request sent','data' => $validated], 201);

    }

    public function approveRequest($id, $userId, $itemId){
        Borrowing::where('id', $id)->update(['approval_status'=>'approved', 'approved_by'=> $userId, 'ongoing_status' => 'ongoing']);

        Item::where('id', $itemId)->update(['status'=>'borrowed']);

        $borrows = Borrowing::all();
        $userId = Auth::id();

        return view('pages.dashboard.borrowing.borrows', compact('borrows','userId'));


    }

    public function denyRequest($id, $userId){
         Borrowing::where('id', $id)->update(['approval_status'=>'rejected', 'approved_by'=>$userId]);



    }

}
