<?php

namespace App\Http\Controllers;

use Money\Money;
use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function pembayaran()
    {
        
        return view('rekap.pembayaran', [
            'title'     => 'Rekap | Pembayaran',
            'kategori'  => Kategori::all(),
            'siswa'     => Siswa::where('status', 1)->get(),
            'pembayaran'    => Pemasukan::all()  ,  
        ]);
    }

    public function filter_pembayaran(Request $request)
    {
        // dd($request->all());
        if($request->kategori == null && $request->date_from == null && $request->date_to == null){
            $pembayaran = Pemasukan::all();
        }elseif($request->date_from == null || $request->date_to == null && $request->kategori != null){
            $pembayaran = Pemasukan::where('id_laba_rugi', $request->kategori)->get();
        }elseif($request->kategori == null && $request->date_from != null && $request->date_to != null){
            $pembayaran = Pemasukan::where('tanggal_pemasukan', '>', $request->date_from)->where('tanggal_pemasukan', '<', $request->date_to)->get();
        }else{
            $pembayaran = Pemasukan::where('id_laba_rugi', $request->kategori)->where('tanggal_pemasukan', '>', $request->date_from)->where('tanggal_pemasukan', '<', $request->date_to)->get();
        }
        
        return view('rekap.pembayaran', [
            'title'     => 'Rekap | Pembayaran',
            'kategori'  => Kategori::all(),
            'siswa'     => Siswa::where('status', 1)->get(),
            'pembayaran' => $pembayaran,
            'date_from'   => $request->date_from,
            'date_to'   => $request->date_to,
            'old_kategori'   => $request->kategori,
        ]);
    }

    public function pemasukan()
    {
        
        
        return view('rekap.pemasukan', [
            'title'         => 'Rekap | Pemasukan',
            'kategori'      => Kategori::all(),
            'januari'       => Pemasukan::whereMonth('tanggal_pemasukan', 1)->whereYear('tanggal_pemasukan', 2023)->get(),
            'februari'      => Pemasukan::whereMonth('tanggal_pemasukan', 2)->whereYear('tanggal_pemasukan', 2023)->get(),
            'maret'         => Pemasukan::whereMonth('tanggal_pemasukan', 3)->whereYear('tanggal_pemasukan', 2023)->get(),
            'april'         => Pemasukan::whereMonth('tanggal_pemasukan', 4)->whereYear('tanggal_pemasukan', 2023)->get(),
            'mei'           => Pemasukan::whereMonth('tanggal_pemasukan', 5)->whereYear('tanggal_pemasukan', 2023)->get(),
            'juni'          => Pemasukan::whereMonth('tanggal_pemasukan', 6)->whereYear('tanggal_pemasukan', 2023)->get(),
            'juli'          => Pemasukan::whereMonth('tanggal_pemasukan', 7)->whereYear('tanggal_pemasukan', 2023)->get(),
            'agustus'       => Pemasukan::whereMonth('tanggal_pemasukan', 8)->whereYear('tanggal_pemasukan', 2023)->get(),
            'september'     => Pemasukan::whereMonth('tanggal_pemasukan', 9)->whereYear('tanggal_pemasukan', 2023)->get(),
            'oktober'       => Pemasukan::whereMonth('tanggal_pemasukan', 10)->whereYear('tanggal_pemasukan', 2023)->get(),
            'november'      => Pemasukan::whereMonth('tanggal_pemasukan', 11)->whereYear('tanggal_pemasukan', 2023)->get(),
            'desember'      => Pemasukan::whereMonth('tanggal_pemasukan', 12)->whereYear('tanggal_pemasukan', 2023)->get(),                        
        ]);
    }

    public function pemasukan_filter(Request $request)
    {
        $tahun = $request->tahun;
        return view('rekap.pemasukan', [
            'title'         => 'Rekap | Pemasukan',
            'kategori'      => Kategori::all(),
            'januari'       => Pemasukan::whereMonth('tanggal_pemasukan', 1)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'februari'      => Pemasukan::whereMonth('tanggal_pemasukan', 2)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'maret'         => Pemasukan::whereMonth('tanggal_pemasukan', 3)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'april'         => Pemasukan::whereMonth('tanggal_pemasukan', 4)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'mei'           => Pemasukan::whereMonth('tanggal_pemasukan', 5)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'juni'          => Pemasukan::whereMonth('tanggal_pemasukan', 6)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'juli'          => Pemasukan::whereMonth('tanggal_pemasukan', 7)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'agustus'       => Pemasukan::whereMonth('tanggal_pemasukan', 8)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'september'     => Pemasukan::whereMonth('tanggal_pemasukan', 9)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'oktober'       => Pemasukan::whereMonth('tanggal_pemasukan', 10)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'november'      => Pemasukan::whereMonth('tanggal_pemasukan', 11)->whereYear('tanggal_pemasukan', $tahun)->get(),
            'desember'      => Pemasukan::whereMonth('tanggal_pemasukan', 12)->whereYear('tanggal_pemasukan', $tahun)->get(),      
            'tahun'         => $tahun                  
        ]);
    }

    public function pengeluaran()
    {
        return view('rekap.pengeluaran', [
            'title'         => 'Rekap | Pengeluaran',
            'kategori'      => Kategori::all(),
            'januari'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 1)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'februari'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 2)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'maret'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 3)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'april'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 4)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'mei'           => Pengeluaran::whereMonth('tanggal_pengeluaran', 5)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'juni'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 6)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'juli'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 7)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'agustus'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 8)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'september'     => Pengeluaran::whereMonth('tanggal_pengeluaran', 9)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'oktober'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 10)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'november'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 11)->whereYear('tanggal_pengeluaran', 2023)->get(),
            'desember'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 12)->whereYear('tanggal_pengeluaran', 2023)->get(),                        
        ]);
    }
    public function pengeluaran_filter(Request $request)
    {
        $tahun = $request->tahun;
        return view('rekap.pengeluaran', [
            'title'         => 'Rekap | Pengeluaran',
            'kategori'      => Kategori::all(),
            'januari'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 1)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'februari'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 2)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'maret'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 3)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'april'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 4)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'mei'           => Pengeluaran::whereMonth('tanggal_pengeluaran', 5)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'juni'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 6)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'juli'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 7)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'agustus'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 8)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'september'     => Pengeluaran::whereMonth('tanggal_pengeluaran', 9)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'oktober'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 10)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'november'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 11)->whereYear('tanggal_pengeluaran', $tahun)->get(),
            'desember'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 12)->whereYear('tanggal_pengeluaran', $tahun)->get(),      
            'tahun'         => $tahun                  
        ]);
    }
}
