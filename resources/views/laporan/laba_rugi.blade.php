@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laporan Laba Rugi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Laporan</li>
                                <li class="breadcrumb-item active">Laba Rugi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Success Alert -->
            @if (session()->has('success'))
            <div class="alert alert-borderless alert-success" role="alert">
                {!! session('success') !!}
            </div>
            @endif
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Laporan Laba Rugi</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                         @if (Route::current()->getName() == 'laporan.laba_rugi.filter')
                                               <a type="button" href="{{ route('laporan.laba_rugi') }}" type="button" class="btn btn-warning ">Reset</a>
                                               @endif
                                        
                                    </div>
                                </div> 
                                                            
                            </div>
                            
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <form action="{{ route('laporan.laba_rugi.filter') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-xxl-5 col-sm-6">
                                        
                                    </div>
                                    <div class="col-xxl-2 col-sm-4">
                                        
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-6">
                                        
                                    </div>
                                    <!--end col-->
                                    
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-4">
                                        <div>
                                            <select name="tahun" class="form-control" id="">
                                                
                                                @if (Route::current()->getName() == 'laporan.laba_rugi.filter')
                                                    <option value="2023" @if($tahun == '2023') selected @endif>2023</option>
                                                    <option value="2022" @if($tahun == '2022') selected @endif>2022</option>
                                                    <option value="2021" @if($tahun == '2021') selected @endif>2021</option>
                                                    <option value="2020" @if($tahun == '2020') selected @endif>2020</option>
                                                    <option value="2019" @if($tahun == '2019') selected @endif>2019</option>
                                                @else
                                                    <option value="2023">2023</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2019">2019</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-1 col-sm-4">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-100" > <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                Filters
                                            </button>
                                            
                                           
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                      
                        <div class="card-body">
                            <div class="table-responsive">
                                
                                <table  class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <th >Pendapatan</th>
                                        <th width="500">Jumlah</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>SPP</td>
                                            <td>                                               
                                                @if($pemasukan->where('id_laba_rugi', 24)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 24)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Uang Gedung</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 25)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 25)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Uang Seragam dan Buku</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 26)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 26)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Uang Pendaftaran</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 27)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 27)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Donasi</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 28)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 28)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lain-Lain</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 29)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 29)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>administrasi</td>
                                            <td>
                                                @if($pemasukan->where('id_laba_rugi', 30)->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->where('id_laba_rugi', 30)->sum('jumlah_masuk'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Pendapatan</b></td>
                                            <td><b>
                                                @if($pemasukan->sum('jumlah_masuk') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pemasukan->sum('jumlah_masuk'),2,',','.') }}
                                                @endif     
                                            </b></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td><b>Pengeluaran</b></td>
                                            <td><b>Jumlah</b></td>
                                        </tr>
                                        <tr>
                                            <td>Beban Gaji dan Upah</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Beban Air/Listrik/Telepon</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Administrasi</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Iuran Bulanan</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Perbaikan</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban BPJS</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Bahan Habis Pakai</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Acara Rapat</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Kegiatan Sekolah</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Beban Administrasi bank</td>
                                            <td>
                                                @if($pengeluaran->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Pengeluaran</b></td>
                                            <td><b>
                                                @if($pengeluaran->sum('jumlah_pengeluaran') == 0)
                                                    -
                                                @else
                                                    {{ number_format($pengeluaran->sum('jumlah_pengeluaran'),2,',','.') }}
                                                @endif     
                                            </b></td>
                                        </tr>
                                        <tfoot>
                                            <th>Laba/Rugi Bersih</th>
                                            <th>{{ number_format($pemasukan->sum('jumlah_masuk') - $pengeluaran->sum('jumlah_pengeluaran'),2,',','.') }}</th>
                                            
                                        </tfoot>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</div>

@endsection