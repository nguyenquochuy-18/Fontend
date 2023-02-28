<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageStaticController extends Controller
{
    public function aboutUs()
    {
        return view('page_static.about');
    }
    public function insurance()
    {
        return view('page_static.insurance');
    }
    public function delivery()
    {
        return view('page_static.delivery');
    }
}
