<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin(){
        return view('login');
    }
    
    public function showRegis(){
        return view('register');
    }

    public function login(Request $request){
        // $user = DB::table('user')->where('email', $request->input('email'))->first();
        $user = User::where('email', $request->input('email'))->first();
        
        if(!$user){
            return back()->withErrors([
                'email' => 'Email tidak terdaftar',
            ]);
        }
        
        if(Hash::check($request->input('password'), $user->password)){
            Auth::login($user);
            $request->session()->put('user', [
                'email' => $user->email, 
                'role' => $user->role,   
            ]);
                if ($user->role == 'Admin') {
                    return redirect()->route('count')->with('success', 'Login Success!-Admin');
                } else {
                    return redirect()->route('indexUser')->with('success', 'Login Success!-User');
                }
            }else{
                return back()->withErrors([
                    'password' => 'Password Salah',
                ]);
            }
            // return redirect('index');
                // return redirect()->route('index')->with('success', 'Login Succsess!');
            // $role = Auth::user()->role;
            // if($role == 'Admin'){
            // }elseif($role == 'User'){
            //     return redirect()->route('indexUser')->with('success', 'Login Succsess!-User');
            // }
    }

        // $result=DB::table('user')->get();
        // if($result->email==$request->input('user-email' && $result->password==$request->input('user-password'))){
        //     return redirect()->route('index');
        // }else{
        //     return back();
        // }
        
        // $cekUser= DB::table('user')->where('email', $request->input('user-email'))->first();
        // if($cekUser=0){
        //     return dd($cekUser);
        // }else{
        //     return redirect()->route('login');
        // }
    

    public function regis(Request $request){
        // $request->validate([
        //     'password' => 'required|min:8|same:password1',
        // ]);

        // $image = base64_encode($request->file('file'));
        $user = User::create([
            'nama' => $request -> input('nama'),
            'email' => $request -> input('email'),
            'password' => Hash::make($request -> input('password')),
            'role' => $request -> input('role'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
        // if($cekRegis = 0){
        //     return redirect()->back()->with('error', 'FAILED');
        // }
        // return redirect()->route('login')->with('success', 'Register Succesfuly!');
    }

    public function showVerificationNotice()
    {
        return view('verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect('/login');
    }

    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        $request->session()->forget('user');
        return redirect('login')->with('success', 'Logout Success!');
    }

    
}
