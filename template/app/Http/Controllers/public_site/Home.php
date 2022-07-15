<?php

namespace App\Http\Controllers\public_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        return view('public_site.index');
    }
}
