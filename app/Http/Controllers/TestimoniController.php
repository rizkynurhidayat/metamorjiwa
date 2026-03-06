<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $testimonis = Testimoni::all();

        return view('testimoni.index', [
            "testimonis" => $testimonis,
            "name" => $user['name']
        ]);
    }

    public function create()
    {
        return view('testimoni.create', [
            "name" => Auth::user()['name']
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'profile' => 'required|image|max:2048',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile')) {
            $validator['profile'] = $request->file('profile')->store('testimoni_images', 'public');
        }

        if ($request->hasFile('image')) {
            $validator['image'] = $request->file('image')->store('testimoni_images', 'public');
        } else {
            unset($validator['image']);
        }

        Testimoni::create($validator);

        return redirect()->route('testimoni.index')->with('success', 'Berhasil Menambahkan Testimoni');
    }

    public function edit(Testimoni $testimoni)
    {
        $user = Auth::user();
        return view('testimoni.edit', [
            "name" => $user['name'],
            "testimoni" => $testimoni
        ]);
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'profile' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile')) {
            if ($testimoni->profile && Storage::disk('public')->exists($testimoni->profile)) {
                Storage::disk('public')->delete($testimoni->profile);
            }
            $validator['profile'] = $request->file('profile')->store('testimoni_images', 'public');
        } else {
            unset($validator['profile']);
        }

        if ($request->hasFile('image')) {
            if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
                Storage::disk('public')->delete($testimoni->image);
            }
            $validator['image'] = $request->file('image')->store('testimoni_images', 'public');
        } else {
            unset($validator['image']);
        }

        $testimoni->update($validator);

        return redirect()->route('testimoni.index')->with('success', 'Berhasil Update Testimoni');
    }

    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->profile && Storage::disk('public')->exists($testimoni->profile)) {
            Storage::disk('public')->delete($testimoni->profile);
        }
        if ($testimoni->image && Storage::disk('public')->exists($testimoni->image)) {
            Storage::disk('public')->delete($testimoni->image);
        }
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Berhasil Menghapus Testimoni');
    }
}
