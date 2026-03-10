<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;   
use App\Models\Testimoni; 
use App\Models\Preview;   

class AdminController extends Controller
{
    public function view(){
        $user = Auth::user();
        
        // 1. Ringkasan Angka
        $totalUsers = User::count();
        $totalMessages = class_exists(Message::class) ? Message::count() : 0;
        $totalTestimoni = class_exists(Testimoni::class) ? Testimoni::count() : 0;
        $totalPreview = class_exists(Preview::class) ? Preview::count() : 0;

        // 2. Mengambil Data Terbaru (Untuk tabel/list di dashboard)
        $latestUsers = User::latest()->take(5)->get();
        $latestMessages = class_exists(Message::class) ? Message::latest()->take(4)->get() : collect([]);

        // 3. Sapaan Otomatis berdasarkan waktu
        $hour = \Carbon\Carbon::now('Asia/Jakarta')->hour;
        if ($hour < 10) { $greeting = 'Selamat pagi'; }
        elseif ($hour < 15) { $greeting = 'Selamat Siang'; }
        elseif ($hour < 18) { $greeting = 'Selamat Sore'; }
        else { $greeting = 'Selamat Malam'; }
    
        return view('admin', compact(
            'user', 'greeting',
            'totalUsers', 'totalMessages', 'totalTestimoni', 'totalPreview',
            'latestUsers', 'latestMessages'
        ));
    }

    public function users(){
         $users = User::all();
         $user = Auth::user();
        return view('users.index', [
            "name" => $user['name'],
            "users" => $users
        ]);
    }

    public function edit(User $user ){
        $userlogin = Auth::user();
        return view('users.edit', [
            "name" => $userlogin['name'],
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Berhasil Update Data');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil menghapus Data');
    }
}