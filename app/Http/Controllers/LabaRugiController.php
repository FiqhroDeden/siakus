<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function index()
    {
        return view('laba_rugi.index', [
            'title'     => 'Kelola Laba Rugi',
            'laba_rugi'    => Kategori::where('jenis_kategori', '>=', 6)->get()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        Kategori::create($data);
        return redirect()->route('laba_rugi')->with('success', 'Data Laba Rugi Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        return redirect()->route('laba_rugi')->with('success', 'Data Laba Rugi Berhasil Diubah');
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('laba_rugi')->with('success', 'Data Laba Rugi Berhasil Dihapus');
    }
}
