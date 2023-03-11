@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laporan Neraca</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Laporan</li>
                                <li class="breadcrumb-item active">Neraca</li>
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
                                        <h5 class="card-title mb-0">Laporan Neraca</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                         @if (Route::current()->getName() == 'laporan.neraca.filter')
                                               <a type="button" href="{{ route('laporan.neraca') }}" type="button" class="btn btn-warning ">Reset</a>
                                               @endif
                                        
                                    </div>
                                </div> 
                                                            
                            </div>
                            
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <form action="{{ route('laporan.neraca.filter') }}" method="post">
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
                                                
                                                @if (Route::current()->getName() == 'laporan.neraca.filter')
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
                            <div class="row" align="center">
                                <h3>PAUD TERPADU FAST START PRE-K DAN K</h3>
                                <h5>LAPORAN NERACA</h5>
                                <br><br>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table  class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead align="center">
                                                <th width="50%">AKTIVA</th>
                                                <th width="50%" >{{ $tahun }}</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Aktiva Lancar</b></td>
                                                    <td></td>
                                                </tr>
                                                <?php $total_aktiva_lancar = 0 ?>
                                                @foreach ($kategori->where('jenis_kategori', 1) as $k)           
                                                <tr>                                                    
                                                    <td>{{ $k->nama }}</td>
                                                    <td align="right">
                                                        @if(count($k->neraca_pemasukan) == 0 && count($k->neraca_pengeluaran) == 0 && count($k
                                                        ->pindah_buku) == 0 && count($k->pengeluaran) == 0)
                                                            -
                                                        @else
                                                            <?php $total = $k->neraca_pemasukan()->whereYear('tanggal_pemasukan', $tahun)
                                                            ->sum('jumlah_masuk') - $k
                                                            ->neraca_pengeluaran()->whereYear('tanggal_pengeluaran', $tahun)
                                                            ->sum('jumlah_pengeluaran') + $k->pengeluaran()
                                                            ->whereYear('tanggal_pengeluaran', $tahun)->sum('jumlah_pengeluaran') + $k
                                                            ->pindah_buku()->whereYear('tanggal', $tahun)
                                                            ->sum('jumlah') ?>

                                                            {{ number_format($total,2,',','.') }}
                                                            <?php $total_aktiva_lancar += $total ?>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td><b>Aktiva Tetap</b></td>
                                                    <td></td>
                                                </tr>
                                                <?php $total_aktiva_tetap = 0 ?>
                                                @foreach ($kategori->where('jenis_kategori', 2) as $k)
                                                    
                                                <tr>
                                                    <td>{{ $k->nama }}</td>
                                                    <td align="right">
                                                        @if(count($k->pengeluaran) == 0)
                                                            -
                                                        @else
                                                            <?php $total = $k->pengeluaran()->whereYear('tanggal_pengeluaran', $tahun)
                                                            ->sum('jumlah_pengeluaran') ?>
                                                            {{ number_format($total,2,',','.') }}
                                                            <?php $total_aktiva_tetap += $total ?>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                                                             
                                            </tbody>
                                            <tfoot align="right">
                                                <th>TOTAL AKTIVA</th>
                                                <th >
                                                     {{ number_format($total_aktiva_lancar + $total_aktiva_tetap,2,',','.') }}
                                                </th>
                                            </tfoot>
                                        </table>                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table  class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead align="center">
                                                <th width="50%">PASIVA</th>
                                                <th width="50%">{{ $tahun }}</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Utang Lancar</b></td>
                                                    <td></td>
                                                </tr>
                                                 <?php $total_utang = 0  ?>
                                                @foreach ($kategori->where('jenis_kategori', 3) as $k)
                                                <tr>
                                                    <td>{{ $k->nama }}</td>
                                                    <td align="right">
                                                        @if(count($k->pengeluaran) == 0)
                                                            -
                                                        @else
                                                            <?php $total = $k->pengeluaran()->whereYear('tanggal_pengeluaran', $tahun)
                                                            ->sum('jumlah_pengeluaran') ?>
                                                            {{ number_format($total,2,',','.') }}
                                                            <?php $total_utang += $total ?>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td><br></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Utang Bank</b></td>
                                                    <td>
                                                       
                                                    </td>
                                                </tr>
                                                
                                                @foreach ($kategori->where('jenis_kategori', 4) as $k)
                                                <tr>
                                                    <td>{{ $k->nama }}</td>
                                                    <td align="right">
                                                        @if(count($k->pengeluaran) == 0)
                                                            -
                                                        @else
                                                            <?php $total = $k->pengeluaran()->whereYear('tanggal_pengeluaran', $tahun)
                                                            ->sum('jumlah_pengeluaran') ?>
                                                            {{ number_format($total,2,',','.') }}
                                                            <?php $total_utang += $total ?>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                                <tr>
                                                    <td><b>Total Utang</b></td>
                                                    <td align="right">
                                                        {{ number_format($total_utang,2,',','.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Modal</b></td>
                                                    <td></td>
                                                </tr>                                                
                                                <?php $total_modal = 0  ?>
                                                @foreach ($kategori->where('jenis_kategori', 5) as $k)
                                                <tr>
                                                    <td>{{ $k->nama }}</td>
                                                    <td align="right">
                                                        @if ($k->id == 22)
                                                            {{ number_format($pemasukan->sum('jumlah_masuk') - $pengeluaran
                                                            ->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @else
                                                            
                                                            @if(count($k->pengeluaran) == 0)
                                                                -
                                                            @else
                                                                <?php $total = $k->pengeluaran()->whereYear('tanggal_pengeluaran', $tahun)
                                                                ->sum('jumlah_pengeluaran') ?>
                                                                {{ number_format($total,2,',','.') }}
                                                                <?php $total_modal += $total ?>
                                                            @endif

                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach                                  
                                                
                                                <tr>
                                                    <td><b>Total Modal</b></td>
                                                    <td align="right"><b>
                                                        {{ number_format($total_modal + $pemasukan->sum('jumlah_masuk') - $pengeluaran
                                                            ->sum('jumlah_pengeluaran'),2,',','.') }}
                                                    </b></td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot align="right">
                                                <th>TOTAL PASSIVA</th>
                                                <th>
                                                    {{ number_format($total_utang + $total_modal + $pemasukan->sum('jumlah_masuk') - $pengeluaran
                                                            ->sum('jumlah_pengeluaran'),2,',','.') }}
                                                </th>
                                            </tfoot>
                                        </table>                                        
                                    </div>
                                </div>
                                
                                
                                
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