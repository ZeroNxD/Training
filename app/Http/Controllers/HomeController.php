<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function GetData(Request $request){
        $listdata = $request->input('listdata', []);

        Log::info('Request Data:', ['listdata' => $listdata]);
        
        foreach ($listdata as $data){
            User::create([
                'id' => $data['Number'],
                'name' => $data['Name'],
                'email' => $data['Email'],
                'status' => $data['Status'] ?? 'NULL',
            ]);
        }
        Log::info('Data stored in database:', ['listdata' => $listdata]);

        return response()->json(['message' => 'Data Received Successfully'])->withCookie(cookie()->forever('session_cookie', session()->getId()));;
    }

    public function ShowPage(){
        $allusers = User::all();
        Log::info('Retrieved Data from DB:', ['allusers' => $allusers]);
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

        return redirect()->route('Home')->with('success', 'User added successfully');
    }

    public function updateStatus(Request $request){
        $user = User::where('email', $request->email)->first();

        if ($user){
            $user->status = $request->input('status');
            $user->save();
            return response()->json(['message' => 'Status updated successfully']);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
}
