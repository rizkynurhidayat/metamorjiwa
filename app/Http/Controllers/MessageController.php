<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
     public function view()
    {
          $user= Auth::user();
        $messages = Message::all()->sortByDesc('created_at');
        
        
        return view('message.index',[
            "messages" => $messages,
            "name" => $user['name'],
           
        ]);
    }

    public function create()
    {
        return view('message.create',[
            "name" => Auth::user()['name']
        ]);
    }

  

     public function edit(Message $message)
    {
        $user = Auth::user();
        if (!$message->read) {
            $message->read = true;
            $message->save();
            // $message->update
        }
         

        return view('message.edit',[
        'name' => $user['name'],
        'message' => $message,
        

        ]);
    }

  

    public function destroy(Message $message){
            $message->delete();
            
            return redirect()->route('message.index')->with('success', 'Berhasil menghapus Data');
    }

  

}
