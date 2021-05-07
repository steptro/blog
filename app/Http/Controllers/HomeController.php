<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function about() {
        return view('about');
    }

    public function setup() {
        return view('setup');
    }
}
