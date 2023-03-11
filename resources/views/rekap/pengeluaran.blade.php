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
                                    
                                  @foreach ($kategori as $k)
                                  
                                  <tr>
                                    <td>{{ $k->nama }}</td>
                                    @for ($i = 1; $i <= 12; $i++)
                                    <td>
                                      @if (count($k->pengeluaran) == 0)
                                        -
                                      @else
                                        <?php $jumlah = $k->pengeluaran()->whereMonth('tanggal_pengeluaran', $i)
                                        ->whereYear('tanggal_pengeluaran', $tahun)
                                        ->sum('jumlah_pengeluaran') ?>                                        
                                        @if ($jumlah == 0)
                                          -
                                        @else
                                          {{ number_format($jumlah,2,',','.') }}                                          
                                        @endif
                                      @endif                                                                             
                                    </td> 
                                    @endfor
                                    
                                  </tr>
                                  @endforeach
                                    
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