@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">About</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">About</li>
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
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Setup Identitas</h5>
                                    </div>
                                </div>
                                                                
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('about.update') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Nama Usaha</label>
                                    <input type="text" name="nama" class="form-control"   value="{{ $about->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"   value="{{ $about->alamat }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Kota</label>
                                    <input type="text" name="kota" class="form-control"   value="{{ $about->kota }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control"   value="{{ $about->provinsi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Kode Pos</label>
                                    <input type="text" name="kodepos" class="form-control"   value="{{ $about->kodepos }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Telepon</label>
                                    <input type="text" name="no_telepon" class="form-control"   value="{{ $about->no_telelon }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">No Hp</label>
                                    <input type="text" name="no_hp" class="form-control"   value="{{ $about->no_hp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Webstite</label>
                                    <input type="url" name="webstite" class="form-control"   value="{{ $about->website }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"   value="{{ $about->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Tanggal Awal Periode</label>
                                    <input type="date" name="tgl_awal_periode" class="form-control"   value="{{ $about->tgl_awal_periode }}">
                                </div>
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
                
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</div>

@endsection