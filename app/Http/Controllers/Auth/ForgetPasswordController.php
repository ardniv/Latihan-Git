<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;


class ForgetPasswordController extends Controller
{
    //
    public function forgot(){
        return view('forgotpass');
    }

    public function emailSubmit(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
        // $user = User::where('email', $request->input('email'))->first();
        
        // if(!$user){
        //     return back()->withErrors([
        //         'email' => 'Email tidak terdaftar',
        //     ]);
        // }else{
        //     $request->session()->put('email', $user->email);
        //     return view('newpassword', ['email' => $user->email]);
        // }

    }

    public function showPass(string $token){

        // dd($token);
        // return 'hola';
        return view('newpassword', ['token' => $token]);
        // $email = $request->session()->get('email');

        // $pass = $request->input('password');
        // $pass1 = $request->input('password1');

        // if($pass !== $pass1){
        //     return redirect()->route('forgot')->with('error', 'Password not Matching');
        // }else{
        //     $newpassword=$pass;
        // }
        // $data=[
        //     'email' => $request -> input('email'),
        //     'password' => Hash::make($newpassword)
        // ];
         
        // DB::table('user')->where('email', $email)->update($data);
        
        // return redirect()->route('login')->with('success', 'Data Success Updated!');
    }

    public function reset(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|same:password1',
        ]);

        // Attempt to reset the user's password
        $status = Password::reset(
            $request->only('email', 'password', 'password1', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // Handle the response
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
