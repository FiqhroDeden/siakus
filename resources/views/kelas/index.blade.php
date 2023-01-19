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
                
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Data Kelas</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                                                
                                        <th data-ordering="false">ID Kelas</th>
                                        <th data-ordering="false">Nama Kelas</th>
                                        <th >Keterangan</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $k)
                                    <tr>                            
                                        <td>{{ $k->id }}</td>
                                        <td>{{ $k->nama }}</td>
                                        <td>{{ $k->keterangan }}</td>                            
                                        <td><span class="badge badge-soft-{{ $k->status ? "info" : "warning" }}">
                                            @if ($k->status)
                                            Aktif
                                            @else
                                            Nonaktif
                                            @endif
                                            </span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">                                                
                                                    <li><a type="button" data-bs-toggle="modal" data-bs-target="#editKelas-{{ $k->id }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteKelas-{{ $k->id }}" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Default Modals -->
                                    
                                    <div id="editKelas-{{ $k->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kelas.update', $k->id) }}" method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Nama Kelas</label>
                                                            <input type="text" name="nama" value="{{ $k->nama }}" class="form-control" id="nama" placeholder="Masukan Nama Kelas">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="">{{ $k->keterangan }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select name="status" class="form-control" id="">
                                                                <option value="1" @if($k->status) selected @endif>Aktif</option>
                                                                <option value="0" @if(! $k->status) selected @endif>Nonaktif</option>
                                                            </select>
                                                        </div>                                                        
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                                                    </form>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <div id="deleteKelas-{{ $k->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Hapus Kelas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kelas.delete', $k->id) }}" method="get">
                                                        @csrf
                                                        <p>Apa anda yakin ingin menghapus kelas <b>{{ $k->nama }}</b> ?</p>
                                                                                                        
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                    </form>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Tambah Kelas</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kelas.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Nama Kelas</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Kelas">
                                </div>
                                <div class="mb-3">
                                    <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Nonaktif</option>
                                    </select>
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