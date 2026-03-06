<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Carousel;
use App\Models\Testimoni;
use App\Models\Sample;
use App\Models\Cta;
use App\Models\SocialMedia;


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
        $hero = Hero::first();
        $carousel = Carousel::all();
        $testimoni = Testimoni::all();
        $sample = Sample::all();
        $cta = Cta::all();
        $socialMedia = SocialMedia::first();
        return view('index', [
            "hero" => $hero,
            "carousel" => $carousel,
            "testimoni" => $testimoni,
            "sample" => $sample,
            "cta" => $cta,
            "socialMedia" => $socialMedia
        ]);
    }
}
