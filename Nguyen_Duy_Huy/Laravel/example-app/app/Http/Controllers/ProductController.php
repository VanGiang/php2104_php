<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function show($id)
    {
        $products = DB::table('products')->find($id);

        return view('home-page', compact('products'));
    }
}
