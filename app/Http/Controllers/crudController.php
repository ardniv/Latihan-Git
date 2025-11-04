<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

class crudController extends Controller
{
    // CRUD DATA MAHASISWA
    public function create(){
        return view('create_data');
    }

    public function store(Request $request)
    {
        $nrp = $request->input('create-nrp');
        $nama = $request->input('create-nama');
        $jurusan = $request->input('create-jurusan');
        $email = $request->input('create-email');

        $parameter = [
            'nrp' => $nrp,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'email' => $email,
        ];

        $client=new Client();
        $url = "http://127.0.0.1:8000/api/posts";
        $response = $client->request('POST', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter)
        ]);
        
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if(!($contentArray['success'])){
            return redirect()->back()->with('error', 'FAILED');
        }
        return redirect()->route('index')->with('success', 'Data Added Succesfuly!');
        // $data = $contentArray['status'];
        // print_r($data);

    }

    public function edit($nrp)
    {
        $mahasiswa=DB::table('data_siswa')->where('nrp', $nrp)->first();
        return view('edit_data', compact('mahasiswa'));
    }

    public function update(Request $request)
    {
        $nrp = $request -> input('edit-nrp');
        $nama = $request -> input('edit-nama');
        $jurusan = $request -> input('edit-jurusan');
        $email = $request -> input('edit-email');

        $parameter = [
            'nrp' => $nrp,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'email' => $email,
        ];

        $client=new Client();
        $url = "http://127.0.0.1:8000/api/posts/$nrp";
        $response = $client->request('PUT', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter)
        ]);
        
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if(!($contentArray['success'])){
            return redirect()->back()->with('error', 'FAILED');
        }
        return redirect()->route('index')->with('success', 'Data Updated Succesfuly!');
    }

    public function destroy($nrp)
    {
        $client=new Client();
        $url = "http://127.0.0.1:8000/api/posts/$nrp";
        $response = $client->request('DELETE', $url);
        
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if(!($contentArray['success'])){
            return redirect()->back()->with('error', 'FAILED');
        }
        return redirect()->route('index')->with('success', 'Data Delete Succesfuly!');
    }

    // CRUD DATA USER
    public function tambah(Request $request)
    {
        $cekCreate = DB::table('user')->insert([
            'nama' => $request -> input('create-nama'),
            'email' => $request -> input('create-email'),
            'password' => Hash::make($request -> input('create-password')),
            'role' => $request -> input('create-role'),
        ]);
        // dd($cekCreate);
        if($cekCreate = 0){
            return redirect()->back()->with('error', 'FAILED');
        }
        return redirect()->route('user')->with('success', 'Data Added Succesfuly!');
    }

    public function hapus($id)
    {
        
        DB::table('user')->where('id', $id)->delete();
        return redirect('/user')->with('success', 'Data Deleted Succesfuly!');
    }

    public function barui(Request $request)
    {
        $data=[
            'id' => $request -> input('edit-id'),
            'nama' => $request -> input('edit-nama'),
            'email' => $request -> input('edit-email'),
            'role' => $request -> input('edit-role'),
        ];
        $cekUpdate = DB::table('user')->where('id', $request -> input('edit-id'))->update($data);
        if($cekUpdate = 0){
            return redirect()->back()->with('error', 'FAILED');
        }
        return redirect()->route('user')->with('success', 'Data Success Updated!');
    }

    
}
