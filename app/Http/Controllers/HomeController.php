<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Service;
use App\Models\Hero;
use App\Models\Team;
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
        $portofolio = Portofolio::all();
        $message = Message::all();
        $service = Service::all();
        $hero = hero::first();
        $teams = Team::all();
        return view('index', [
            "portofolio" => $portofolio,
            "hero" => $hero,
            "service" => $service,
            "teams" => $teams
        ]);
    }
}
