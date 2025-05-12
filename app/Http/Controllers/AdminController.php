<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // view main pages
    public function overview(){
        return view('pages.dashboard.overview');
    }

    public function items(){
        return view('pages.dashboard.items.items');
    }
    public function users(){
        $users = User::all();

        return view('pages.dashboard.users.users', compact('users'));
    }
    public function borrows(){
        return view('pages.dashboard.borrows.borrows');
    }
    public function returns(){
        return view('pages.dashboard.returns.returns');
    }
    public function categories(){
        return view('pages.dashboard.categories.categories');
    }
    public function subcategories(){
        return view('pages.dashboard.subcategories.subcategories');
    }

    // view Create pages
    public function createUser(){
        $classes = SchoolClass::all();

        return view('pages.dashboard.users.create', compact('classes'));
    }

    // view edit pages
    public function editUsers($id){
        $user = User::find($id);
        $classes = SchoolClass::all();

        return view('pages.dashboard.users.edit', compact('user', 'classes'));
    }
}
