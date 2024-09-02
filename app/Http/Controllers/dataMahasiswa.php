<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class dataMahasiswa extends Controller
{
    public function index()
    {
        $profil=Auth::user();
        
        $client=new Client();
        $url = "http://127.0.0.1:8000/api/posts";
        $response = $client->request('GET', $url);
        
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        

        return view('data_mahasiswa', ['data'=>$data], compact('profil'));

        // print_r($data);
        // $mahasiswa['mahasiswa']=DB::select('SELECT * FROM data_siswa');
        // return view('data_mahasiswa', $mahasiswa, compact('profil'));

    }
    
    public function indexUser()
    {
        $user=Auth::user();
        $mahasiswa['mahasiswa']=DB::select('SELECT * FROM data_siswa');
        return view('data_mhs', $mahasiswa, compact('user'));
    }

    public function user()
    {
        $profil=Auth::user();
        $pengguna['pengguna']=DB::select('SELECT * FROM user');
        // $mahasiswa['mahasiswa']=DB::select('SELECT * FROM data_siswa');d
        // dd($pengguna);
        return view('data_user', $pengguna, compact('profil'));
    }

    public function hitung()
    {
        $profil=Auth::user();
        
        $jmlhMhs = DB::select('SELECT COUNT(*) as count FROM data_siswa')[0]->count;
        $terdaftar = DB::select('SELECT COUNT(*) as count FROM user')[0]->count;
        $verif = DB::select('SELECT COUNT(*) as count FROM user WHERE email_verified_at IS NOT NULL')[0]->count;
        $informatika = DB::select('SELECT COUNT(*) as count FROM data_siswa WHERE jurusan LIKE ?', ['%Informatika%'])[0]->count;
        $si = DB::select('SELECT COUNT(*) as count FROM data_siswa WHERE jurusan LIKE ?', ['%Sistem Informasi%'])[0]->count;
        $dkv = DB::select('SELECT COUNT(*) as count FROM data_siswa WHERE jurusan LIKE ?', ['%DKV%'])[0]->count;
        
        return view('dashboard', compact('jmlhMhs', 'terdaftar', 'verif', 'informatika', 'si', 'dkv', 'profil'));
    }
}
