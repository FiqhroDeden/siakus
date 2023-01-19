<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title'                     => 'Dashboard | SIAKUS',
            'pendapatan'                => Pemasukan::whereYear('tanggal_pemasukan', 2023)->get(),
            'pengeluaran'               => Pengeluaran::whereYear('tanggal_pengeluaran', 2023)->get(),
            'pemasukan_januari'         => Pemasukan::whereMonth('tanggal_pemasukan', 1)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_februari'        => Pemasukan::whereMonth('tanggal_pemasukan', 2)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_maret'           => Pemasukan::whereMonth('tanggal_pemasukan', 3)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_april'           => Pemasukan::whereMonth('tanggal_pemasukan', 4)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_mei'             => Pemasukan::whereMonth('tanggal_pemasukan', 5)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_juni'            => Pemasukan::whereMonth('tanggal_pemasukan', 6)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_juli'            => Pemasukan::whereMonth('tanggal_pemasukan', 7)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_agustus'         => Pemasukan::whereMonth('tanggal_pemasukan', 8)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_september'       => Pemasukan::whereMonth('tanggal_pemasukan', 9)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_oktober'         => Pemasukan::whereMonth('tanggal_pemasukan', 10)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_november'        => Pemasukan::whereMonth('tanggal_pemasukan', 11)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),
            'pemasukan_desember'        => Pemasukan::whereMonth('tanggal_pemasukan', 12)->whereYear('tanggal_pemasukan', 2023)->sum('jumlah_masuk'),  
            'pengeluaran_januari'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 1)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_februari'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 2)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_maret'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 3)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_april'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 4)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_mei'           => Pengeluaran::whereMonth('tanggal_pengeluaran', 5)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_juni'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 6)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_juli'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 7)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_agustus'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 8)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_september'     => Pengeluaran::whereMonth('tanggal_pengeluaran', 9)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_oktober'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 10)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_november'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 11)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'),
            'pengeluaran_desember'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 12)->whereYear('tanggal_pengeluaran', 2023)->sum('jumlah_pengeluaran'), 
            'tahun'                     => 2023
        ];
        
        return view('dashboard.index', compact('data'));
    }

    public function tahun($tahun)
    {
        $data = [
            'title'                     => 'Dashboard | SIAKUS',
            'pendapatan'                => Pemasukan::whereYear('tanggal_pemasukan', $tahun)->get(),
            'pengeluaran'               => Pengeluaran::whereYear('tanggal_pengeluaran', $tahun)->get(),
            'pemasukan_januari'         => Pemasukan::whereMonth('tanggal_pemasukan', 1)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_februari'        => Pemasukan::whereMonth('tanggal_pemasukan', 2)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_maret'           => Pemasukan::whereMonth('tanggal_pemasukan', 3)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_april'           => Pemasukan::whereMonth('tanggal_pemasukan', 4)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_mei'             => Pemasukan::whereMonth('tanggal_pemasukan', 5)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_juni'            => Pemasukan::whereMonth('tanggal_pemasukan', 6)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_juli'            => Pemasukan::whereMonth('tanggal_pemasukan', 7)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_agustus'         => Pemasukan::whereMonth('tanggal_pemasukan', 8)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_september'       => Pemasukan::whereMonth('tanggal_pemasukan', 9)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_oktober'         => Pemasukan::whereMonth('tanggal_pemasukan', 10)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_november'        => Pemasukan::whereMonth('tanggal_pemasukan', 11)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),
            'pemasukan_desember'        => Pemasukan::whereMonth('tanggal_pemasukan', 12)->whereYear('tanggal_pemasukan', $tahun)->sum('jumlah_masuk'),  
            'pengeluaran_januari'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 1)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_februari'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 2)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_maret'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 3)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_april'         => Pengeluaran::whereMonth('tanggal_pengeluaran', 4)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_mei'           => Pengeluaran::whereMonth('tanggal_pengeluaran', 5)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_juni'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 6)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_juli'          => Pengeluaran::whereMonth('tanggal_pengeluaran', 7)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_agustus'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 8)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_september'     => Pengeluaran::whereMonth('tanggal_pengeluaran', 9)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_oktober'       => Pengeluaran::whereMonth('tanggal_pengeluaran', 10)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_november'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 11)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'),
            'pengeluaran_desember'      => Pengeluaran::whereMonth('tanggal_pengeluaran', 12)->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran'), 
            'tahun'                     => $tahun
        ];
        
        return view('dashboard.index', compact('data'));
    }
}
