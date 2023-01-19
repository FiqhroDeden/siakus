<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class NeracaController extends Controller
{
    public function index()
    {
        return view('neraca.index', [
            'title'     => 'Kelola Neraca',
            'neraca'    => Kategori::where('jenis_kategori', '<=' , 5)->get()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        Kategori::create($data);
        return redirect()->route('neraca')->with('success', 'Data Neraca Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->jenis_kategori = $request->jenis_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        return redirect()->route('neraca')->with('success', 'Data Neraca Berhasil Diubah');
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('neraca')->with('success', 'Data Neraca Berhasil Dihapus');
    }
}
