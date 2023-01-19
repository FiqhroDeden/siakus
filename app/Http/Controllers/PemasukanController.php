<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    //

    public function index()
    {
        return view('transaksi.pemasukan', [
            'title'         => 'Kelola Pemasukan',
            'pemasukan'     => Pemasukan::all(),
            'siswa'         => Siswa::where('status', 1)->get(),
            'kategori'      => Kategori::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data           = $request->all();
        $data['kode']   = sprintf("%06d", mt_rand(1, 999999));
        Pemasukan::create($data);
        return redirect()->route('pemasukan')->with('success', 'Data Pemasukan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $pemasukan = Pemasukan::find($id);
        $pemasukan->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukan->id_siswa = $request->id_siswa;
        $pemasukan->uraian = $request->uraian;
        $pemasukan->id_laba_rugi = $request->id_laba_rugi;
        $pemasukan->jumlah_masuk = $request->jumlah_masuk;
        $pemasukan->jumlah_keluar = $request->jumlah_keluar;
        $pemasukan->id_neraca = $request->id_neraca;
        $pemasukan->keterangan = $request->keterangan;
        $pemasukan->save();
        return redirect()->route('pemasukan')->with('success', 'Data Pemasukan berhasil diubah');
    }

    public function delete($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return redirect()->route('pemasukan')->with('success', 'Data Pemasukan berhasil dihapus');
    }
}
