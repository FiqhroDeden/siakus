@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Kelas</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Kelas</li>
                                <li class="breadcrumb-item active">Detail</li>
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
                
                <div >
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Data Siswa pada kelas {{ $kelas->nama }}</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>                                                                                                        
                                        <th data-ordering="false">Nama Siswa</th>
                                        <th >Status Pembayaran</th>                                                                           
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa->where('status', 1) as $s)                                    
                                    <tr>                            
                                        <td>{{ $s->nama }}</td>
                                        <td>
                                            @if($s->pemasukan->where('id_laba_rugi', 24)->last() != null)
                                            {{ $s->pemasukan->where('id_laba_rugi', 24)->last()->uraian }}
                                            @else
                                            
                                            @endif
                                        </td>
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