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
            'januari'       => Pemasukan::where('uraian', 'LIKE', '%januari%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'februari'      => Pemasukan::where('uraian', 'LIKE', '%februari%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'maret'         => Pemasukan::where('uraian', 'LIKE', '%maret%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'april'         => Pemasukan::where('uraian', 'LIKE', '%april%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'mei'           => Pemasukan::where('uraian', 'LIKE', '%mei%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'juni'          => Pemasukan::where('uraian', 'LIKE', '%juni%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'juli'          => Pemasukan::where('uraian', 'LIKE', '%juli%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'agustus'       => Pemasukan::where('uraian', 'LIKE', '%agustus%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'september'     => Pemasukan::where('uraian', 'LIKE', '%september%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'oktober'       => Pemasukan::where('uraian', 'LIKE', '%oktober%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'november'      => Pemasukan::where('uraian', 'LIKE', '%november%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),
            'desember'      => Pemasukan::where('uraian', 'LIKE', '%desember%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(), 
            'total'         => Pemasukan::whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->get(),    
            'old_siswa'     => $request->siswa,
            'old_kategori'  => $request->kategori,
            'tahun'         => $request->tahun,
            'tp_januari'       => Pemasukan::where('uraian', 'LIKE', '%januari%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_februari'      => Pemasukan::where('uraian', 'LIKE', '%februari%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_maret'         => Pemasukan::where('uraian', 'LIKE', '%maret%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_april'         => Pemasukan::where('uraian', 'LIKE', '%april%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_mei'           => Pemasukan::where('uraian', 'LIKE', '%mei%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_juni'          => Pemasukan::where('uraian', 'LIKE', '%juni%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_juli'          => Pemasukan::where('uraian', 'LIKE', '%juli%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_agustus'       => Pemasukan::where('uraian', 'LIKE', '%agustus%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_september'     => Pemasukan::where('uraian', 'LIKE', '%september%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_oktober'       => Pemasukan::where('uraian', 'LIKE', '%oktober%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_november'      => Pemasukan::where('uraian', 'LIKE', '%november%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            'tp_desember'      => Pemasukan::where('uraian', 'LIKE', '%desember%')->whereYear('tanggal_pemasukan', $request->tahun)->where('id_siswa', $request->siswa)->where('id_laba_rugi', $request->kategori)->first(),
            

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
