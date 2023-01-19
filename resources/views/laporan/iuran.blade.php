@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laporan IURAN Siswa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Laporan</li>
                                <li class="breadcrumb-item active">IURAN Siswa</li>
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
                                        <h5 class="card-title mb-0">laporan Iuran Siswa</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                         @if (Route::current()->getName() == 'laporan.iuran.filter')
                                            <a type="button" href="{{ route('laporan.iuran') }}" type="button" class="btn btn-warning ">Reset</a>
                                         @endif
                                        
                                    </div>
                                </div> 
                                                            
                            </div>
                            
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <form action="{{ route('laporan.iuran.filter') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-xxl-5 col-sm-6">
                                        <div>
                                            <select name="siswa" class="select2 form-select" id="" required>
                                                <option value="">Pilih Siswa</option>
                                                @foreach ($siswa as $s)
                                                    @if (Route::current()->getName() == 'laporan.iuran.filter')
                                                    <option value="{{ $s->id }}" @if($s->id == $old_siswa) selected @endif>{{ $s->nama }}</option>
                                                    @else
                                                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-sm-4">
                                        
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-6">
                                        <div>
                                            <select name="kategori" class="form-control" id="" required>
                                                
                                                @foreach ($kategori->where('jenis_kategori', 6) as $k)
                                                    @if (Route::current()->getName() == 'laporan.iuran.filter')
                                                    <option value="{{ $k->id }}" @if($k->id == $old_kategori) selected @endif>{{ $k->nama }}</option>
                                                    @else
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-4">
                                        <div>
                                            <select name="tahun" class="form-control" id="">
                                                
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')
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
                                        <tr>                                
                                            <th data-ordering="false">Bulan</th>         
                                            <th >Jumlah Pembayaran</th>                                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Januari</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($januari->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($januari->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Februari</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($februari->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($februari->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Maret</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($maret->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($maret->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>April</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($april->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($april->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mei</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($mei->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($mei->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Juni</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($juni->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($juni->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Juli</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($juli->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($juli->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Agustus</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($agustus->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($agustus->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>September</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($september->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($september->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Oktober</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($oktober->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($oktober->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>November</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($november->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($november->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
                                                @endif                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Desember</td>
                                            <td>
                                                @if (Route::current()->getName() == 'laporan.iuran.filter')  
                                                    @if($desember->sum('jumlah_masuk') == 0)
                                                        -
                                                    @else
                                                        {{ number_format($desember->sum('jumlah_masuk'),2,',','.') }}
                                                    @endif
                                                @else
                                                    -
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