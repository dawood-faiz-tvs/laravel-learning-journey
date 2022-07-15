<?php

namespace App\Http\Controllers\public_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Services extends Controller
{
    public function index(){
        return view('public_site.services');
    }
}
