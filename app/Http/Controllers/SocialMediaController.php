<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $socialMedia = SocialMedia::first();

        return view('sosialmedia.edit', [
            "socialMedia" => $socialMedia,
            "name" => $user['name']
        ]);
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
        ]);

        $socialMedia = SocialMedia::first();

        if ($socialMedia) {
            $socialMedia->update($validator);
        } else {
            SocialMedia::create($validator);
        }

        return redirect()->route('sosialmedia.edit')->with('success', 'Berhasil memperbarui data sosial media');
    }
}
