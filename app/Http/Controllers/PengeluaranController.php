<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        return view('transaksi.pengeluaran', [
            'title'         => 'Kelola Pengeluaran',
            'pengeluaran'     => Pengeluaran::all(),
            'siswa'         => Siswa::where('status', 1)->get(),
            'kategori'      => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data           = $request->all();
        $data['kode']   = sprintf("%06d", mt_rand(1, 999999));
        Pengeluaran::create($data);
        return redirect()->route('pengeluaran')->with('success', 'Data Pengeluaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;    
        $pengeluaran->no_kontrak = $request->no_kontrak;
        $pengeluaran->uraian = $request->uraian;
        $pengeluaran->id_kategori = $request->id_kategori;
        $pengeluaran->jumlah_masuk = $request->jumlah_masuk;
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->id_rekening = $request->id_rekening;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->save();
        return redirect()->route('pengeluaran')->with('success', 'Data pengeluaran berhasil diubah');
    }

    public function delete($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran')->with('success', 'Data Pengeluaran berhasil dihapus');
    }
}
