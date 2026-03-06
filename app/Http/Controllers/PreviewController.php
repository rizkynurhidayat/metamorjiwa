<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class PreviewController extends Controller
{
    //
    public function view()
    {
          $user= Auth::user();
        $previews = Preview::all();
        
        return view('preview.index',[
            "previews" => $previews,
            "name" => $user['name']
        ]);
    }

    public function create()
    {
        return view('preview.create',[
            "name" => Auth::user()['name']
        ]);
    }

    public function store(Request $request){
    
    $validator = $request->validate([
        'tagline' => 'required|string|max:255',
        'image' => 'required|image|max:2045'
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('preview_images', 'public');
        $validator['image'] = $imagePath;
    }
    
    $preview = Preview::create($validator);

    return redirect()->route('preview.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(Preview $preview)
    {
        $user = Auth::user();
        return view('preview.edit',[
        "name" => $user['name'],
        "preview" => $preview

        ]);
    }

    public function update (Request $request, Preview $preview){
           $validator = $request->validate([
             'tagline' => 'required|string|max:255',
             'image' => 'required|image|max:2045'
        ]);
            if ($request->hasFile('image')){
                if($preview->image && Storage::disk('public')->exists($preview->image)){
                    Storage::disk('public')->delete($preview->image);
                }
                $imagePath = $request->file('image')->store('preview_images', 'public');
                $validator['image'] = $imagePath;
            
            } 
            $preview->update($validator);
            return redirect()->route('preview.index')->with('success', 'Berhasil Update Data');
    }

    public function destroy(Preview $preview){
            if($preview->image && Storage::disk('public')->exists($preview->image)){
                Storage::disk('public')->delete($preview->image);
            }
            $preview->delete();
            
            return redirect()->route('preview.index')->with('success', 'Berhasil menghapus Data');
    }



}
