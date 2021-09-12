<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductsSeeder extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        // $id = DB::table('products')
        //         ->where('id', 5)
        //         ->update(['sale_off' => 0]);

        $products = DB::table('products')
                ->orderBy('quality', 'asc')
                ->orderBy('price', 'asc')
                ->paginate(8);
                

        return view('home-page', compact('products'));
    }
}
