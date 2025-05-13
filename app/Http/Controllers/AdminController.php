<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Item;
use App\Models\SchoolClass;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\ReturnItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // view main pages
    public function overview(){
        return view('pages.dashboard.overview');
    }

    public function items(){
        $items = Item::all();
        return view('pages.dashboard.items.items', compact('items'));
    }
    public function users(){
        $users = User::all();

        return view('pages.dashboard.users.users', compact('users'));
    }

    public function schoolClasses(){
        $classes = SchoolClass::all();

        return view('pages.dashboard.classes.classes', compact('classes'));
    }

    public function borrows(){
        $borrows = Borrowing::all();
        return view('pages.dashboard.borrows.borrows', compact('borrows'));
    }

    public function returns(){
        $returns = ReturnItem::all();

        return view('pages.dashboard.returns.returns', compact('returns'));
    }

    public function categories(){
        $categories = Category::all();
        return view('pages.dashboard.categories.categories', compact('categories'));
    }

    public function subcategories(){
        $subcategories = SubCategory::all();
        $categories = Category::all();

        return view('pages.dashboard.subcategories.subcat', compact('subcategories', 'categories'));
    }

    // view Create pages
    public function createUser(){
        $classes = SchoolClass::all();

        return view('pages.dashboard.users.create', compact('classes'));
    }

    public function createClass(){
        return view('pages.dashboard.classes.create');
    }

    public function createCat(){
        return view('pages.dashboard.categories.create');
    }

    public function createSubcat(){
        $categories = Category::all();

        return view('pages.dashboard.subcategories.create', compact('categories'));
    }

    // view edit pages
    public function editUsers($id){
        $user = User::find($id);
        $classes = SchoolClass::all();

        return view('pages.dashboard.users.edit', compact('user', 'classes'));
    }

    public function editCat($id){
        $category = Category::findOrFail($id);
        return view('pages.dashboard.categories.edit', compact('category'));
    }
}
