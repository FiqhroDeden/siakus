<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.index', [
            'title'     => 'About',
            'about'     => About::first()
        ]);
    }

    public function update(Request $request)
    {
        $about = About::first();
        $about['nama'] = $request->nama;
        $about['alamat'] = $request->alamat;
        $about['kota'] = $request->kota;
        $about['provinsi'] = $request->provinsi;
        $about['kodepos'] = $request->kodepos;
        $about['no_telepon'] = $request->no_telepon;
        $about['no_hp'] = $request->no_hp;
        $about['webstite'] = $request->webstite;
        $about['email'] = $request->email;
        $about['tgl_awal_periode'] = $request->tgl_awal_periode;
        $about->save();
        return redirect()->route('about')->with('success', 'Berhasil mengubah Identitas Usaha Anda ');
    }

    public function profile()
    {
        return view('about.profile', [
            'title'     => 'Profil Pengguna',            
        ]);
    }
    public function profile_update(Request $reqeust)
    {
        // dd($reqeust->all());
        $user = User::find(Auth::user()->id);
        $user['name']   = $reqeust->name;
        $user['username']   = $reqeust->username;
        $user['email']   = $reqeust->email;
        if($reqeust->password != null){
            $user['password'] = Hash::make($reqeust->password);
        }
        $user->save();
        return redirect()->route('profile')->with('success', 'Berhasil mengubah Profil Anda ');
    }
}
