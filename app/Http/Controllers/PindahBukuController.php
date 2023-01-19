<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\PindahBuku;
use Illuminate\Http\Request;

class PindahBukuController extends Controller
{
    public function index()
    {
        return view('transaksi.pindah_buku', [
            'title'         => 'Kelola Pindah Buku',
            'pindah_buku'   => PindahBuku::all(),
            'kategori'      => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        PindahBuku::create($data);
        return redirect()->route('pindah_buku')->with('success', 'Data Pindah Buku berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pindah_buku = PindahBuku::find($id);
        $pindah_buku->from = $request->from;
        $pindah_buku->to = $request->to;
        $pindah_buku->jumlah = $request->jumlah;
        $pindah_buku->tanggal = $request->tanggal;
        $pindah_buku->keterangan = $request->keterangan;
        $pindah_buku->save();
        return redirect()->route('pindah_buku')->with('success', 'Data Pindah Buku berhasil diubah');
    }

    public function delete($id)
    {
        $pindah_buku = PindahBuku::find($id);
        $pindah_buku->delete();
        return redirect()->route('pindah_buku')->with('success', 'Data Pindah Buku berhasil dihapus');
    }
}
