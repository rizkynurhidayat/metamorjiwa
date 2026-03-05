<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    //
     public function view()
    {
          $user= Auth::user();
        $contacts = Contact::first();
        
        return view('contact.edit',[
            "contacts" => $contacts,
            "name" => $user['name']
        ]);
    }

    

    public function store(Request $request){
    
    $validator = $request->validate([
        'title' => 'required|string|max:255',
        'tagline' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        
    ]);

   
    
    $contact = Contact::create($validator);

    return redirect()->route('contact.edit')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(Contact $contact)
    {
        $user = Auth::user();
        return view('contact.edit',[
        "name" => $user['name'],
        "contact" => $contact

        ]);
    }

    public function update (Request $request, Contact $contact){
           $validator = $request->validate([
             'title' => 'required|string|max:255',
             'tagline' => 'required|string|max:255',
             'contact' => 'required|string|max:255'
        ]);
             
            $contact->update($validator);
            return redirect()->route('contact.edit')->with('success', 'Berhasil Update Data');
    }

    public function destroy(Contact $contact){
            
            $contact->delete();
            
            return redirect()->route('contact.edit')->with('success', 'Berhasil menghapus Data');
    }
}
