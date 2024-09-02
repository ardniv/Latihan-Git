<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class gate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$level):Response
    { 
        if(!$request->session()->has('user')){
            return redirect('login')->with('resp_mg', 'Sesi tidak ditemukan');
        } else{
            if((in_array(session('user')['role'], $level))){
                return $next($request);
            }else{
                return redirect()->back();
            }
        }
        // if(Auth::check()){
        //     $user = Auth::user();
        //     $role = $user->role;

        //     if ($role == 'Admin') {
        //         return redirect('index');
        //     } elseif ($role == 'User') {
        //         return redirect('indexUser');
        //     }
        // }
        // return redirect('login');
        
        // $user = Auth::user();
        // $role = $user->role;
        // if($role=='Admin'){
        //     // return $next($request);
        //     return redirect('index');
        // }
        // return redirect('login');
    }
}
