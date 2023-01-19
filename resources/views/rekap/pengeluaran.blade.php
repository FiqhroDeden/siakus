@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Rekap Pengeluaran</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Rekap</li>
                                <li class="breadcrumb-item active">Pemasukan</li>
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
                                        <h5 class="card-title mb-0">Data Rekap Pengeluaran</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                         @if (Route::current()->getName() == 'rekap.pengeluaran.filter')
                                            <a type="button" href="{{ route('rekap.pengeluaran') }}" type="button" class="btn btn-warning ">Reset</a>
                                         @endif
                                        
                                    </div>
                                </div> 
                                                            
                            </div>
                            
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            
                            <form action="{{ route('rekap.pengeluaran.filter') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-xxl-9 col-sm-6">
                                        
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-6">
                                        <div>
                                            <select name="tahun" class="form-control" id="">
                                                
                                                @if (Route::current()->getName() == 'rekap.pengeluaran.filter')
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
                                            <button type="submit" class="btn btn-primary w-100 " > <i class="ri-equalizer-fill me-1 align-bottom"></i>
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
                                    <tr>                                                                
                                        <th data-ordering="false">Kategori</th>                                                 
                                        <th>Januari</th>                                                                  
                                        <th>Februari</th>                                                                  
                                        <th>Maret</th>                                                                  
                                        <th>April</th>                                                                  
                                        <th>Mei</th>                                                                  
                                        <th>Juni</th>                                                                  
                                        <th>Juli</th>                                                                  
                                        <th>Agustus</th>                                                                  
                                        <th>September</th>   
                                        <th>Oktober</th>                                                               
                                        <th>November</th>                                                                  
                                        <th>Desember</th>                                                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    <tr>
                                        <td>Aset Komputer dan Peralatan Elektronik</td>
                                        <td>
                                            @if($januari->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>Aset Mesin Usaha</td>
                                        <td>
                                            @if($januari->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aset Furnitur</td>
                                        <td>
                                            @if($januari->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aset Kendaraan Bermotor</td>
                                        <td>
                                            @if($januari->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aset Renovasi dan Prasarana Gedung</td>
                                        <td>
                                            @if($januari->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Donasi/Hibah</td>
                                        <td>
                                            @if($januari->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laba Ditahan</td>
                                        <td>
                                            @if($januari->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 21)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 21)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laba Tahun Berjalan</td>
                                        <td>
                                            @if($januari->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 22)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 22)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Gaji dan Upah</td>
                                        <td>
                                            @if($januari->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 31)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 31)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Air/Listrik/Telepon</td>
                                        <td>
                                            @if($januari->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 32)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 32)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Administrasi</td>
                                        <td>
                                            @if($januari->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 33)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 33)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Iuran Bulanan</td>
                                        <td>
                                            @if($januari->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 34)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 34)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Perbaikan</td>
                                        <td>
                                            @if($januari->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 35)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 35)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban BPJS</td>
                                        <td>
                                            @if($januari->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 36)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 36)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Bahan Habis Pakai</td>
                                        <td>
                                            @if($januari->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 37)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 37)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Acara Rapat</td>
                                        <td>
                                            @if($januari->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 38)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 38)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Kegiatan Sekolah</td>
                                        <td>
                                            @if($januari->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 39)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 39)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Beban Administrasi bank</td>
                                        <td>
                                            @if($januari->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->where('id_kategori', 40)->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->where('id_kategori', 40)->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <td>
                                            @if($januari->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($januari->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($februari->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($februari->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($maret->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($maret->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($april->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($april->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($mei->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($mei->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juni->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juni->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($juli->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($juli->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($agustus->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($agustus->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($september->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($september->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($oktober->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($oktober->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($november->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($november->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td> 
                                        <td>
                                            @if($desember->sum('jumlah_pengeluaran') == 0)
                                            -
                                            @else
                                              {{ number_format($desember->sum('jumlah_pengeluaran'),2,',','.') }}
                                            @endif
                                        </td>  
                                    </tr>
                                    
                                                                                                                                     
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