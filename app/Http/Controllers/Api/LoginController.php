<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   //
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts = User::all();
        // $posts = User::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data User', $posts);
    }

    
}
