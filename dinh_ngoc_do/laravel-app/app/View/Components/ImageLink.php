<?php

use Illuminate\Support\Facades\Auth;
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
