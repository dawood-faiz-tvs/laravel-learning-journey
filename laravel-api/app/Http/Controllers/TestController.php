<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        // $name = 'Dawood Faiz';
        // $email = 'dawoodfaiz.2@gmail.com';
        // $data = compact('name', 'email');
        // return view('test')->with($data);

        return view('test', [
            'name' => 'Dawood Faiz Muhammad',
            'email' => 'dawoodfaizmuhammad@gmail.com'
        ]);
    }
}
