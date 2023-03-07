<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    //

    public function index()
    {
        return view('kelas.index', [
            'title' => 'Kelola Kelas',
            'kelas' => Kelas::get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Kelas::create($data);
        return redirect()->route('kelas')->with('success', 'Kelas Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama = $request->nama;
        $kelas->keterangan = $request->keterangan;
        $kelas->status = $request->status;
        $kelas->save();
        return redirect()->route('kelas')->with('success', 'Kelas Berhasil diubah');
    }

    public function delete($id)
    {
        $kelas = Kelas::find($id);
        $nama = $kelas->nama;
        $kelas->delete();
        return redirect()->route('kelas')->with('success', "Kelas <b> $nama </b> Berhasil dihapus");
    }
    public function detail($id)
    {
        $kelas = Kelas::find($id);

        return view('kelas.detail', [
            'title'     => 'Detail Kelas'.''. $kelas->nama,
            'kelas'     => $kelas,
            'siswa'     => Siswa::where('id_kelas', $kelas->id)->get()
        ]);
    }
}
