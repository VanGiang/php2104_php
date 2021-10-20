<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

if (!function_exists('showProductImage')) {

    function showProductImage($image)
    {
        $str_length = Str::length($image);
        if ($str_length > 20) {
            return asset('storage/products/' . $image);
        } else if ($str_length < 20) {
            return ('/themes/shopper_fashion/images/' . $image);
        }
    }
}

if (!function_exists('showCartQuantity')) {
    function showCartQuantity()
    {
        $sessionData = session('cart');

        /* \Log::info($sessionData); */
        
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}
