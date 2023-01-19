@extends('layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Halo, {{ Auth::user()->username }}!</h4>
                                    <p class="text-muted mb-0">Berikut Laporan Keuangan Sekolah hari ini.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="row g-3 mb-0 align-items-center">
                                            
                                            <div class="col-auto">
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $data['tahun'] }}
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2023) }}">2023</a>
                                                        <li>                                                        
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2022) }}">2022</a>
                                                        <li>                                                        
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2021) }}">2021</a>
                                                        <li>                                                        
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2020) }}">2020</a>
                                                        <li>                                                        
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2019) }}">2019</a>
                                                        <li>                                                        
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('dashboard.tahun', 2018) }}">2018</a>
                                                        <li>                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Vertical Variation -->                                            
                                            
                                        
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Total Pendapatan</p>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp.<span class="counter-value" data-target="{{ $data['pendapatan']->sum('jumlah_masuk') }}">0</span>
                                            </h4>
                                            <a href="{{ route('pemasukan') }}" class="text-decoration-underline text-muted">Lihat Data Pendapatan</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-success rounded fs-3">
                                                <i class="bx bx-dollar-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Total Pengeluaran</p>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp. <span class="counter-value" data-target="{{ $data['pengeluaran']->sum('jumlah_pengeluaran') }}">0</span></h4>
                                            <a href="{{ route('pengeluaran') }}" class="text-decoration-underline text-muted">Lihat Data Pengeluaran</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded fs-3">
                                                <i class="bx bx-shopping-bag text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        {{-- <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Customers</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                                +29.08 %
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="183.35">0</span>M
                                            </h4>
                                            <a href="" class="text-decoration-underline text-muted">See
                                                details</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                                <i class="bx bx-user-circle text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                Laba Rugi/Bersih</p>
                                        </div>
                                        {{-- <div class="flex-shrink-0">
                                            <h5 class="text-muted fs-14 mb-0">
                                                +0.00 %
                                            </h5>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">Rp.<span class="counter-value" data-target="{{ $data['pendapatan']->sum('jumlah_masuk') - $data['pengeluaran']->sum('jumlah_pengeluaran') }}">0</span>
                                            </h4>
                                            <a href="" class="text-decoration-underline text-muted"><br></a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                                <i class="bx bx-wallet text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Data Keuangan Tahun {{ $data['tahun'] }}</h4>
                                    
                                </div><!-- end card header -->
                                <div class="card-body pb-0">
                                    <div class="table-responsive">
                                        <table  class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                                            
                                                    
                                                    <th data-ordering="false">BULAN</th>         
                                                                                                                
                                                    <th >PENDAPATAN</th>                                                                    
                                                    <th >PENGELUARAN</th>                                                                    
                                                    <th >LABA/RUGI BERSIH</th>                                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Januari</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_januari'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_januari'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_januari'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_januari'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_januari'] - $data['pengeluaran_januari'] != 0)
                                                        @if($data['pengeluaran_januari'] > $data['pemasukan_januari'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_januari'] - $data['pengeluaran_januari'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_januari'] - $data['pengeluaran_januari'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Febuari</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_februari'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_februari'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_februari'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_februari'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_februari'] - $data['pengeluaran_februari'] != 0)
                                                        @if($data['pengeluaran_februari'] > $data['pemasukan_februari'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_februari'] - $data['pengeluaran_februari'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_februari'] - $data['pengeluaran_februari'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Maret</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_maret'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_maret'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_maret'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_maret'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_maret'] - $data['pengeluaran_maret'] != 0)
                                                        @if($data['pengeluaran_maret'] > $data['pemasukan_maret'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_maret'] - $data['pengeluaran_maret'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_maret'] - $data['pengeluaran_maret'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>April</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_april'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_april'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_april'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_april'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_april'] - $data['pengeluaran_april'] != 0)
                                                        @if($data['pengeluaran_april'] > $data['pemasukan_april'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_april'] - $data['pengeluaran_april'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_april'] - $data['pengeluaran_april'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Mei</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_mei'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_mei'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_mei'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_mei'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_mei'] - $data['pengeluaran_mei'] != 0)
                                                        @if($data['pengeluaran_mei'] > $data['pemasukan_mei'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_mei'] - $data['pengeluaran_mei'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_mei'] - $data['pengeluaran_mei'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Juni</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_juni'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_juni'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_juni'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_juni'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_juni'] - $data['pengeluaran_juni'] != 0)
                                                        @if($data['pengeluaran_juni'] > $data['pemasukan_juni'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_juni'] - $data['pengeluaran_juni'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_juni'] - $data['pengeluaran_juni'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Juli</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_juli'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_juli'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_juli'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_juli'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_juli'] - $data['pengeluaran_juli'] != 0)
                                                        @if($data['pengeluaran_juli'] > $data['pemasukan_juli'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_juli'] - $data['pengeluaran_juli'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_juli'] - $data['pengeluaran_juli'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Agustus</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_agustus'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_agustus'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_agustus'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_agustus'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_agustus'] - $data['pengeluaran_agustus'] != 0)
                                                        @if($data['pengeluaran_agustus'] > $data['pemasukan_agustus'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_agustus'] - $data['pengeluaran_agustus'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_agustus'] - $data['pengeluaran_agustus'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>September</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_september'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_september'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_september'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_september'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_september'] - $data['pengeluaran_september'] != 0)
                                                        @if($data['pengeluaran_september'] > $data['pemasukan_september'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_september'] - $data['pengeluaran_september'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_september'] - $data['pengeluaran_september'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Oktober</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_oktober'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_oktober'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_oktober'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_oktober'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_oktober'] - $data['pengeluaran_oktober'] != 0)
                                                        @if($data['pengeluaran_oktober'] > $data['pemasukan_oktober'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_oktober'] - $data['pengeluaran_oktober'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_oktober'] - $data['pengeluaran_oktober'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>November</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_november'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_november'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_november'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_november'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_november'] - $data['pengeluaran_november'] != 0)
                                                        @if($data['pengeluaran_november'] > $data['pemasukan_november'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_november'] - $data['pengeluaran_november'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_november'] - $data['pengeluaran_november'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Desember</td>
                                                    <td>
                                                         
                                                        @if($data['pemasukan_desember'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pemasukan_desember'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    <td>
                                                         
                                                        @if($data['pengeluaran_desember'] == 0)
                                                            -
                                                        @else
                                                            {{ number_format($data['pengeluaran_desember'],2,',','.') }}
                                                        @endif
                                                                                                 
                                                    </td>
                                                    {{-- <td> --}}                                                    
                                                    @if($data['pemasukan_desember'] - $data['pengeluaran_desember'] != 0)
                                                        @if($data['pengeluaran_desember'] > $data['pemasukan_desember'])
                                                            <td style="color:red">
                                                                {{ number_format($data['pemasukan_desember'] - $data['pengeluaran_desember'],2,',','.') }}
                                                            </td>                                                            
                                                        @else
                                                            <td style="color:blue">
                                                                {{ number_format($data['pemasukan_desember'] - $data['pengeluaran_desember'],2,',','.') }}
                                                            </td>
                                                        @endif
                                                    @else
                                                        <td>
                                                            -
                                                        </td>
                                                    @endif
                                                    {{-- </td> --}}
                                                </tr>
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->                      

                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Balance Overview</h4>
                                    
                                </div><!-- end card header -->
                                <div class="card-body px-0">
                                    {{-- <ul class="list-inline main-chart text-center mb-0">
                                        <li class="list-inline-item chart-border-left me-0 border-0">
                                            <h4 class="text-primary">$584k <span class="text-muted d-inline-block fs-13 align-middle ms-2">Revenue</span></h4>
                                        </li>
                                        <li class="list-inline-item chart-border-left me-0">
                                            <h4>$497k<span class="text-muted d-inline-block fs-13 align-middle ms-2">Expenses</span>
                                            </h4>
                                        </li>
                                        <li class="list-inline-item chart-border-left me-0">
                                            <h4><span data-plugin="counterup">3.6</span>%<span class="text-muted d-inline-block fs-13 align-middle ms-2">Profit Ratio</span></h4>
                                        </li>
                                    </ul> --}}

                                    <div id="revenue-expenses-charts" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>

                </div> <!-- end .h-100-->

            </div> <!-- end col -->

            
        </div>

    </div>
    <!-- container-fluid -->
</div>
    

    

@endsection