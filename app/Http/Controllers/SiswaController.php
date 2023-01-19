<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index', [
            'title'     => 'Kelola Siswa',
            'siswa'     => Siswa::get(),
            'kelas'     => Kelas::where('status', 1)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Siswa::create($data);
        return redirect()->route('siswa')->with('success', 'Siswa Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama =  $request->nama;
        $siswa->id_kelas =  $request->id_kelas;
        $siswa->tanggal_masuk =  $request->tanggal_masuk;
        $siswa->tanggal_keluar =  $request->tanggal_keluar;
        $siswa->keterangan =  $request->keterangan;
        $siswa->status =  $request->status;
        $siswa->save();
        return redirect()->route('siswa')->with('success', 'Data Siswa Berhasil diubah');

    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $nama = $siswa->nama;
        $siswa->delete();
        return redirect()->route('siswa')->with('success', "Berhasil menghapus <b> $nama</b> dari daftar siswa.");
    }
}
