<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PindahBukuController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function (){
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('login');
    });
});


Route::middleware('auth')->group( function(){
    Route::controller(DashboardController::class)->group( function(){
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/dashboard/tahun/{tahun}', 'tahun')->name('dashboard.tahun');
    });
    Route::controller(KelasController::class)->group(function (){
        Route::get('/kelas', 'index')->name('kelas');
        Route::post('/kelas/store', 'store')->name('kelas.store');
        Route::post('/kelas/update/{id}', 'update')->name('kelas.update');
        Route::get('/kelas/delete/{id}', 'delete')->name('kelas.delete');
        Route::get('/kelas/detail/{id}', 'detail')->name('kelas.detail');
    });
    Route::controller(SiswaController::class)->group(function (){
        Route::get('/siswa', 'index')->name('siswa');
        Route::post('/siswa/store', 'store')->name('siswa.store');
        Route::post('/siswa/update/{id}', 'update')->name('siswa.update');
        Route::get('/siswa/delete/{id}', 'delete')->name('siswa.delete');
    });
    Route::controller(NeracaController::class)->group(function (){
        Route::get('/neraca', 'index')->name('neraca');
        Route::post('/neraca/store', 'store')->name('neraca.store');
        Route::post('/neraca/update/{id}', 'update')->name('neraca.update');
        Route::get('/neraca/delete/{id}', 'delete')->name('neraca.delete');
    });
    Route::controller(LabaRugiController::class)->group(function (){
        Route::get('/laba_rugi', 'index')->name('laba_rugi');
        Route::post('/laba_rugi/store', 'store')->name('laba_rugi.store');
        Route::post('/laba_rugi/update/{id}', 'update')->name('laba_rugi.update');
        Route::get('/laba_rugi/delete/{id}', 'delete')->name('laba_rugi.delete');
    });
    Route::controller(PemasukanController::class)->group(function (){
        Route::get('/pemasukan', 'index')->name('pemasukan');
        Route::post('/pemasukan/store', 'store')->name('pemasukan.store');
        Route::post('/pemasukan/update/{id}', 'update')->name('pemasukan.update');
        Route::get('/pemasukan/delete/{id}', 'delete')->name('pemasukan.delete');
    });
    Route::controller(PengeluaranController::class)->group(function (){
        Route::get('/pengeluaran', 'index')->name('pengeluaran');
        Route::post('/pengeluaran/store', 'store')->name('pengeluaran.store');
        Route::post('/pengeluaran/update/{id}', 'update')->name('pengeluaran.update');
        Route::get('/pengeluaran/delete/{id}', 'delete')->name('pengeluaran.delete');
    });
    Route::controller(PindahBukuController::class)->group(function (){
        Route::get('/pindah_buku', 'index')->name('pindah_buku');
        Route::post('/pindah_buku/store', 'store')->name('pindah_buku.store');
        Route::post('/pindah_buku/update/{id}', 'update')->name('pindah_buku.update');
        Route::get('/pindah_buku/delete/{id}', 'delete')->name('pindah_buku.delete');
    });
    Route::controller(RekapController::class)->group(function (){
        Route::get('/rekap', 'pembayaran')->name('rekap.pembayaran');
        Route::get('/rekap/pembayaran', 'pembayaran')->name('rekap.pembayaran');
        Route::post('/rekap/pembayaran/filter', 'filter_pembayaran')->name('rekap.pembayaran.filter');
        Route::get('/rekap/pemasukan', 'pemasukan')->name('rekap.pemasukan');
        Route::post('/rekap/pemasukan/filter', 'pemasukan_filter')->name('rekap.pemasukan.filter');
        Route::get('/rekap/pengeluaran', 'pengeluaran')->name('rekap.pengeluaran');
        Route::post('/rekap/pengeluaran/filter', 'pengeluaran_filter')->name('rekap.pengeluaran.filter');
    });
    Route::controller(LaporanController::class)->group(function (){
        Route::get('/laporan', 'iuran')->name('laporan.iuran');
        Route::get('/laporan/iuran', 'iuran')->name('laporan.iuran');
        Route::post('/laporan/iuran/filter', 'iuran_filter')->name('laporan.iuran.filter');
        Route::get('/laporan/laba_rugi', 'laba_rugi')->name('laporan.laba_rugi');
        Route::post('/laporan/laba_rugi/filter', 'laba_rugi_filter')->name('laporan.laba_rugi.filter');
        Route::get('/laporan/neraca', 'neraca')->name('laporan.neraca');
        Route::post('/laporan/neraca/filter', 'neraca_filter')->name('laporan.neraca.filter');
    });
    Route::controller(AboutController::class)->group(function (){
        Route::get('/about', 'index')->name('about');
        Route::post('/about/update', 'update')->name('about.update');
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile/update', 'profile_update')->name('profile.update');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});