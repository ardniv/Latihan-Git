<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class profilController extends Controller
{
    //
    public function profileForm(){
        $user=Auth::user();
        return view('profile', compact('user'));
    }
    
    public function profileFormAdmin(){
        $user=Auth::user();
        return view('dashlayout.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        // $request->validate([
        //     'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        // ]);

        $pass = $request->input('password');
        $pic = $request->file('img');

        $data = ([
            'nama'=> $request -> input('nama'),
            'email' => $request -> input('email')
        ]);

        if (!empty($pass)) {
            $data['password'] = Hash::make($pass);
        }

        if ($pic) {
            $imageName = time() . '.' . $pic->extension();
            $imagePath = $pic->storeAs('images', $imageName, 'public');
            $data['img'] = $imagePath;
        }
            
        $cek = User::where('id', Auth::user()->id)->first()->update($data);
        return redirect()->back()->with('success', 'Profile Updated!');
    }
}
