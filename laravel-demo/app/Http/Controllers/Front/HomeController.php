<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $featuredProducts = [];

        // return view( view: 'front.index', compact( var_name: 'featuredProducts'));
    }
}
