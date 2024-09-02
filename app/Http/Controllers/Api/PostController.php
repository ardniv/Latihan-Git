<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
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
        $posts = Mahasiswa::all();
        // $posts = Mahasiswa::latest()->paginate(5);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }
    
    public function store(Request $request)
    {
        
        $post = Mahasiswa::create([
            'nrp' => $request -> nrp,
            'nama' => $request -> nama,
            'jurusan' => $request -> jurusan,
            'email' => $request -> email
        ]);

        if (!$post) {
            return response()->json($validator->errors(), 422);
        }

        return new PostResource(true, 'List Data Posts', $post);
    }

    /**
     * show
     *
     * @param  mixed $nrp
     * @return void
     */
    public function show($nrp)
    {
        //find post by ID
        $post = Mahasiswa::find($nrp);

        //return single post as a resource
        return new PostResource(true, 'Detail Data Post!', $post);
    }

    public function update(Request $request, $nrp)
    {
        $post = Mahasiswa::find($nrp);

        $post->update([
            'nama' => $request -> nama,
            'jurusan' => $request -> jurusan,
            'email' => $request -> email
        ]);

        if (!$post) {
            return response()->json($validator->errors(), 422);
        }

        return new PostResource(true, 'Data Post Berhasil Diubah!', $post);
    }

    public function destroy($nrp)
    {

        //find post by ID
        $post = Mahasiswa::find($nrp);

        //delete post
        $post->delete();

        //return response
        return new PostResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
