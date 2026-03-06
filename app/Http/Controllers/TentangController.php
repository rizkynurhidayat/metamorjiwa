<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function edit(){
        $userlogin = Auth::user();
        $tentang = Tentang::first() ?? new Tentang();
        return view('tentang.edit', [
            "name" => $userlogin['name'],
            "tentang" => $tentang
        ]);
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'heading'     => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
        ]);

        Tentang::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('tentang.edit')->with('success', 'Tentang Section berhasil diupdate!');
    }
}
