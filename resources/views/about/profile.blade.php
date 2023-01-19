@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profil Pengguna</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profil</li>
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
                                        <h5 class="card-title mb-0">Setup Profil</h5>
                                    </div>
                                </div>
                                                                
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control"   value="{{ Auth::user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control"   value="{{ Auth::user()->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"   value="{{ Auth::user()->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"   >
                                    <span style="color:red">Kosongkan jika tidak ingin mengganti password</span>
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