<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\PindahBuku;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function iuran()
    {
        return view('laporan.iuran', [
            'title'         => 'Laporan | IURAN',
            'siswa'         => Siswa::where('status', 1)->get(),
            'kategori'      => Kategori::all(),
             

        ]);
    }
    public function iuran_filter(Request $request)
    {
        // dd($request->all());
        return view('laporan.iuran', [
            'title'         => 'Laporan | IURAN',
            'siswa'         => Siswa::where('status', 1)->get(),
            'kategori'      => Kategori::all(),
            'januari'       => Pemasukan::whereMonth('tanggal_pemasukan', 1)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'februari'      => Pemasukan::whereMonth('tanggal_pemasukan', 2)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'maret'         => Pemasukan::whereMonth('tanggal_pemasukan', 3)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'april'         => Pemasukan::whereMonth('tanggal_pemasukan', 4)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'mei'           => Pemasukan::whereMonth('tanggal_pemasukan', 5)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'juni'          => Pemasukan::whereMonth('tanggal_pemasukan', 6)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'juli'          => Pemasukan::whereMonth('tanggal_pemasukan', 7)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'agustus'       => Pemasukan::whereMonth('tanggal_pemasukan', 8)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'september'     => Pemasukan::whereMonth('tanggal_pemasukan', 9)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'oktober'       => Pemasukan::whereMonth('tanggal_pemasukan', 10)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'november'      => Pemasukan::whereMonth('tanggal_pemasukan', 11)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'desember'      => Pemasukan::whereMonth('tanggal_pemasukan', 12)->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),     
            'old_siswa'     => $request->siswa,
            'old_kategori'  => $request->kategori,
            'tahun'         => $request->tahun    

        ]);

        
    }

    public function laba_rugi()
    {
         return view('laporan.laba_rugi', [
            'title'     => 'Laporan | Laba Rugi',
            'pengeluaran'   => Pengeluaran::whereYear('tanggal_pengeluaran',2023)->get(),
            'pemasukan'     => Pemasukan::whereYear('tanggal_pemasukan',2023)->get(),
         ]);  
    }

    public function laba_rugi_filter(Request $request)
    {
        return view('laporan.laba_rugi', [
            'title'     => 'Laporan | Laba Rugi',
            'pengeluaran'   => Pengeluaran::whereYear('tanggal_pengeluaran',$request->tahun)->get(),
            'pemasukan'     => Pemasukan::whereYear('tanggal_pemasukan',$request->tahun)->get(),
            'tahun'         => $request->tahun
         ]); 
    }

    public function neraca()
    {
        return view('laporan.neraca', [
            'title'     => 'Laporan | Neraca',
            'pemasukan' => Pemasukan::whereYear('tanggal_pemasukan', 2023)->get(),
            'pengeluaran' => Pengeluaran::whereYear('tanggal_pengeluaran', 2023)->get(),
            'pindah_buku'   => PindahBuku::whereYear('tanggal', 2023)->get(),
            'tahun'     => 2023,
        ]);
    }
    public function neraca_filter(Request $request)
    {
        return view('laporan.neraca', [
            'title'     => 'Laporan | Neraca',
            'pemasukan' => Pemasukan::whereYear('tanggal_pemasukan', $request->tahun)->get(),
            'pengeluaran' => Pengeluaran::whereYear('tanggal_pengeluaran', $request->tahun)->get(),
            'pindah_buku'   => PindahBuku::whereYear('tanggal', $request->tahun)->get(),
            'tahun'     => $request->tahun,
        ]);
    }
}
