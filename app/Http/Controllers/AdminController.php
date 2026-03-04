<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AdminController extends Controller
{
    public function view(){
        $user = Auth::user();
    
        return view('Admin', [
            "name" => $user['name']]);

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

    $user-> update($validatedData);
    return redirect()->route('users.index')->with('success', 'Berhasil Update Data');

    }
public function destroy(User $user){
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Berhasil menghapus Data');
    }
}
