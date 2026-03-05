<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
use App\Models\Service;
use App\Models\Hero;
<<<<<<< HEAD
use App\Models\Testimoni;
=======
use App\Models\Message;
>>>>>>> a42f84803e08232f1ad60ffc6d63985322ee1c5a


class HomeController extends Controller
{
     public function store(Request $request){
    
    $validator = $request->validate([
        'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            ]);

    $message = Message::create($validator);

    return redirect()->back()->with('success', 'Pesan Berhasil Dikirim');

     }

    public function view()
    {
        $previews = Preview::all();
<<<<<<< HEAD
        $testimonis = Testimoni::all();
        
=======
        $message = Message::all();
>>>>>>> a42f84803e08232f1ad60ffc6d63985322ee1c5a
        $hero = hero::first();
        
        return view('index', [
            "preview" => $previews,
            "testimonis" => $testimonis,
            "hero" => $hero,
            
            
        ]);
    }
}
