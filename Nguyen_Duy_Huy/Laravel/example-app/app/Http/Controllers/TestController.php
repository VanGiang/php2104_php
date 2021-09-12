<?php

    namespace App\Http\Controllers;
    use App\Models\blogTest;

    class TestController extends Controller
    {
       public function action() {
        $data = blogTest::getData();
        return view('test1', compact('data')); 
       }
    }

?>