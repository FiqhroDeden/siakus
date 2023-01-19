@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Rekap Pembayaran</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Rekap</li>
                                <li class="breadcrumb-item active">Pembayaran</li>
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
                                        <h5 class="card-title mb-0">Data Rekap Pembayaran</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                         @if (Route::current()->getName() == 'rekap.pembayaran.filter')
                                               <a type="button" href="{{ route('rekap.pembayaran') }}" type="button" class="btn btn-warning ">Reset</a>
                                               @endif
                                        
                                    </div>
                                </div> 
                                                            
                            </div>
                            
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <form action="{{ route('rekap.pembayaran.filter') }}" method="post">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-xxl-5 col-sm-6">
                                        
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-6">
                                        <div>
                                            <select name="kategori" class="form-control" id="">
                                                <option value="">Semua Kategori</option>
                                                @foreach ($kategori->where('jenis_kategori', 6) as $k)
                                                    @if (Route::current()->getName() == 'rekap.pembayaran.filter')
                                                    <option value="{{ $k->id }}" @if($k->id == $old_kategori) selected @endif>{{ $k->nama }}</option>
                                                    @else
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-4">
                                        <div>
                                            @if (Route::current()->getName() == 'rekap.pembayaran.filter')
                                            <input type="date" name="date_from" value="{{ $date_from }}" class="form-control" placeholder="From">
                                            @else
                                            <input type="date" name="date_from"  class="form-control" placeholder="From">
                                            @endif
                                            <span>From</span>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-4">
                                        <div>
                                            @if (Route::current()->getName() == 'rekap.pembayaran.filter')
                                            <input type="date" name="date_to" value="{{ $date_to }}" class="form-control" placeholder="To">
                                            @else
                                            <input type="date" name="date_to"  class="form-control" placeholder="To">
                                            @endif
                                            <span>To</span>
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
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                                                
                                        <th data-ordering="false" width="10">No</th>
                                        <th data-ordering="false">Siswa</th>         
                                        <th>Kategori</th>                           
                                        <th >Tanggal</th>
                                        <th >Jumlah</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($pembayaran as $p)
                                    <tr>                            
                                        <td> {{ $i++ }}</td>
                                        <td>{{ $p->siswa->nama }}</td>
                                        <td>{{ $p->laba_rugi->nama }}</td>
                                        <td>{{ $p->tanggal_pemasukan }}</td>                                    
                                        <td>Rp. {{ number_format($p->jumlah_masuk,2,',','.') }}</td>
                                        
                                    </tr>
                                   
                                    
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
                
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</div>

@endsection