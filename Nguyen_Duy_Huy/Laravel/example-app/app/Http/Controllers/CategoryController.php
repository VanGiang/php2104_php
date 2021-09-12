<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category
    public function control()
    {
        return view('category.control');
    }

    // category/1
    public function view($id)
    {
        return view('category.view');
    }
}
