<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function overview(){
        return view('pages.dashboard.overview');
    }
}
