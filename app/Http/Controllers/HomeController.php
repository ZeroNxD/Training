<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ShowPage(){
        $allusers = User::all();
        return view('HomeUser', compact('allusers'));
    }

    public function FormCreate(){
        return view("CreateUser");
    }

    public function AddNewUser(Request $requests){
        $requests->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users'
        ]);

        $newusers = new User();
        $newusers->name = $requests->input('name');
        $newusers->email = $requests->input('email');
        $newusers->created_at = now();
        $newusers->updated_at = now();
        $newusers->save();

        return redirect()->route('Home');
    }
}
