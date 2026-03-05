<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;


class HomeController extends Controller
{

    public function view()
    {
        
        $hero = hero::first();
        
        return view('index', [
            
            "hero" => $hero,
            
        ]);
    }
}
