<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
use App\Models\Service;
use App\Models\Hero;
use App\Models\Testimoni;


class HomeController extends Controller
{

    public function view()
    {
        $previews = Preview::all();
        $testimonis = Testimoni::all();
        
        $hero = hero::first();
        
        return view('index', [
            "preview" => $previews,
            "testimonis" => $testimonis,
            "hero" => $hero,
            
            
        ]);
    }
}
