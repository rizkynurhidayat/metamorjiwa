<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
     public function view()
    {
          $user= Auth::user();
         $contacts = Contact::first();
        
        return view('contact.edit',[
            "contact" => $contacts,
            "name" => $user['name']
        ]);
    }

     public function update (Request $request, Contact $contact){
           $validator = $request->validate([
             'title' => 'required|string|max:255',
             'tagline' => 'required|string|max:255',
             'contact' => 'required|string|max:255',
        ]);
            if ($request->hasFile('image')){
                if($contact->image && Storage::disk('public')->exists($contact->image)){
                    Storage::disk('public')->delete($contact->image);
                }
                $imagePath = $request->file('image')->store('contact_images', 'public');
                $validator['image'] = $imagePath;
            
            } 
            $contact->update($validator);
            return redirect()->route('contact.edit')->with('success', 'Berhasil');
    }
}
