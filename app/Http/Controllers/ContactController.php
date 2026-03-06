<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
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

     public function update (Request $request){
    // 1. Validasi request
    $validator = $request->validate([
        'title' => 'required|string|max:255',
        'tagline' => 'required|string|max:255',
        'tagline1' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
    ]);

    // 2. Ambil data contact pertama dari database
    $contact = Contact::first();

    // 3. Handle upload file gambar (jika ada)
    if ($request->hasFile('image')){
        // Jika data lama ada dan gambarnya ada di storage, hapus gambar lamanya
        if($contact && $contact->image && Storage::disk('public')->exists($contact->image)){
            Storage::disk('public')->delete($contact->image);
        }
        $imagePath = $request->file('image')->store('contact_images', 'public');
        $validator['image'] = $imagePath;
    } 

    // 4. Update atau Create data
    if ($contact) {
        // Jika data sudah ada di database, lakukan update
        $contact->update($validator);
    } else {
        // Jika database masih kosong sama sekali, buat data baru
        Contact::create($validator);
    }

    // 5. Kembalikan response di akhir fungsi
    return redirect()->route('contact.edit')->with('success', 'Berhasil memperbarui data kontak');
}
}
