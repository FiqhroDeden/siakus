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
                                                <tr>
                                                    
                                                    <td>Kas Kecil</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_1 = $pemasukan->where('id_neraca', 1)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 1)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 1)->sum('jumlah') + $pindah_buku->where('to', 1)->sum('jumlah') ?>

                                                        @if($pemasukan->where('id_neraca', 1)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 1)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 1)->sum('jumlah') + $pindah_buku->where('to', 1)->sum('jumlah') == 0)
                                                        -
                                                        @else
                                                            
                                                            {{ number_format($pemasukan->where('id_neraca', 1)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 1)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 1)->sum('jumlah') + $pindah_buku->where('to', 1)->sum('jumlah'),2,',','.') }}
                                                        @endif                                                         
                                                        
                                                         
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kas</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_2 = $pemasukan->where('id_neraca', 2)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 2)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 2)->sum('jumlah') + $pindah_buku->where('to', 2)->sum('jumlah') ?>

                                                        @if($pemasukan->where('id_neraca', 2)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 2)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 2)->sum('jumlah') + $pindah_buku->where('to', 2)->sum('jumlah') == 0)
                                                        -
                                                        @else
                                                            
                                                            {{ number_format($pemasukan->where('id_neraca', 2)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 2)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 2)->sum('jumlah') + $pindah_buku->where('to', 2)->sum('jumlah'),2,',','.') }}
                                                        @endif 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bank Arta Graha</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_3 = $pemasukan->where('id_neraca', 3)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 3)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 3)->sum('jumlah') + $pindah_buku->where('to', 3)->sum('jumlah') ?>

                                                        @if($pemasukan->where('id_neraca', 3)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 3)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 3)->sum('jumlah') + $pindah_buku->where('to', 3)->sum('jumlah') == 0)
                                                        -
                                                        @else
                                                            
                                                            {{ number_format($pemasukan->where('id_neraca', 3)->sum('jumlah_masuk') - $pengeluaran->where('id_rekening', 3)->sum('jumlah_pengeluaran') - $pindah_buku->where('from', 3)->sum('jumlah') + $pindah_buku->where('to', 3)->sum('jumlah'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Rekening 2</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Rekening 3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Piutang 1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Piutang 2</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Piutang 3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Piutang 4</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Piutang Lain-Lain</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Aktiva Tetap</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Aset Komputer dan Peralatan Elektronik</td>
                                                    <td align="right">

                                                        <?php $p_11 = $pengeluaran->where('id_kategori', 11)->sum('jumlah_pengeluaran') ?>

                                                        @if($pengeluaran->where('id_kategori', 11)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 11)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Aset Mesin Usaha</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_12 = $pengeluaran->where('id_kategori', 12)->sum('jumlah_pengeluaran') ?>

                                                        @if($pengeluaran->where('id_kategori', 12)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 12)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Aset Furnitur</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_13 = $pengeluaran->where('id_kategori', 13)->sum('jumlah_pengeluaran') ?>

                                                        @if($pengeluaran->where('id_kategori', 13)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 13)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>                                                
                                                <tr>
                                                    <td>Aset Kendaraan Bermotor</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_14 = $pengeluaran->where('id_kategori', 14)->sum('jumlah_pengeluaran') ?>

                                                        @if($pengeluaran->where('id_kategori', 14)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 14)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Aset Renovasi dan Prasarana Gedung</td>
                                                    <td align="right">
                                                        
                                                        <?php $p_15 = $pengeluaran->where('id_kategori', 15)->sum('jumlah_pengeluaran') ?>

                                                        @if($pengeluaran->where('id_kategori', 15)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 15)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>                                                 
                                            </tbody>
                                            <tfoot align="right">
                                                <th>TOTAL AKTIVA</th>
                                                <th >
                                                     {{ number_format($p_1 + $p_2 + $p_3 + $p_11 + $p_12 + $p_13 + $p_14 + $p_15  ,2,',','.') }}
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
                                                <tr>
                                                    <td>Utang Usaha 1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Utang Usaha 2</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td height="100%"><br></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Utang Bank</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Utang Bank 1</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Utang Bank 2</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Utang Bank 3</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Utang Bank 4</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Total Utang</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Modal</b></td>
                                                    <td></td>
                                                </tr>                                                
                                                <tr>
                                                    <td><b>Modal Pemilik</b></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Donasi/Hibah</td>
                                                    <td align="right">
                                                        <?php $m_1 = $pengeluaran->where('id_kategori', 20)->sum('jumlah_pengeluaran') ?>
                                                        @if($pengeluaran->where('id_kategori', 20)->sum('jumlah_pengeluaran') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 20)->sum('jumlah_pengeluaran'),2,',','.') }}
                                                        @endif 
                                                    </td>
                                                </tr>                                        
                                                <tr>
                                                    <td>Laba Ditahan</td>
                                                    <td align="right">
                                                        <?php $m_2 = $pengeluaran->where('id_kategori', 21)->sum('jumlah_masuk') ?>
                                                        @if($pengeluaran->where('id_kategori', 21)->sum('jumlah_masuk') == 0)
                                                            -
                                                        @else
                                                            {{ number_format($pengeluaran->where('id_kategori', 21)->sum('jumlah_masuk'),2,',','.') }}
                                                        @endif  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Laba Tahun Berjalan</td>
                                                    <td align="right">
                                                        <?php $m_3 =  $pemasukan->sum('jumlah_masuk') - $pengeluaran->sum('jumlah_pengeluaran')?>
                                                        {{ number_format($pemasukan->sum('jumlah_masuk') - $pengeluaran->sum('jumlah_pengeluaran'),2,',','.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Total Modal</b></td>
                                                    <td align="right"><b>
                                                        {{ number_format($m_2 + $m_3 - $m_1,2,',','.') }}    
                                                    </b></td>
                                                </tr>
                                                
                                            </tbody>
                                            <tfoot align="right">
                                                <th>TOTAL PASSIVA</th>
                                                <th>
                                                    {{ number_format($m_2 + $m_3 - $m_1,2,',','.') }} 
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