<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
use App\Models\Service;
use App\Models\Hero;
use App\Models\Message;


class HomeController extends Controller
{
     public function store(Request $request){
    
    $validator = $request->validate([
        'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            ]);

    $message = Message::create($validator);

    return redirect()->back()->with('success', 'Pesan Berhasil Dikirim');

     }

    public function view()
    {
        $previews = Preview::all();
        $message = Message::all();
        $hero = hero::first();
        
        return view('index', [
            "preview" => $previews,
            
            "hero" => $hero,
            
            
        ]);
    }
}
