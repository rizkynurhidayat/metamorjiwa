<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hero;

class HeroController extends Controller
{
    public function edit(){
        $userlogin = Auth::user();
        $hero = Hero::first() ?? new Hero();
        return view('hero.edit', [
            "name" => $userlogin['name'],
            "hero" => $hero
        ]);
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'heading'       => 'required|string|max:255',
            'deskripsi'          => 'required|string|max:255',
            'button_text'      => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $hero = Hero::first();
            if ($hero && $hero->image && file_exists(public_path('storage/' . $hero->image))) {
                unlink(public_path('storage/' . $hero->image));
            }
            $validatedData['image'] = $request->file('image')->store('hero', 'public');
        } else {
            unset($validatedData['image']);
        }

        Hero::updateOrCreate(['id' => 1], $validatedData);

        return redirect()->route('hero.edit')->with('success', 'Hero Section berhasil diupdate!');
    }
}
