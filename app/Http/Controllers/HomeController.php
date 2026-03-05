<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
use App\Models\Service;
use App\Models\Hero;


class HomeController extends Controller
{

    public function view()
    {
        $previews = Preview::all();
        
        
        $hero = hero::first();
        
        return view('index', [
            "preview" => $previews,
            
            "hero" => $hero,
            
            
        ]);
    }
}
