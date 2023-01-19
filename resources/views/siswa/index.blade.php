@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Siswa</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
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
                                        <h5 class="card-title mb-0">Daftar Siswa</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#tambahSiswa"><i class="ri-add-line align-bottom me-1"></i> Tambah Siswa</button>
                                        
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        {{-- Modal Tambah Siswa --}}
                        <div id="tambahSiswa" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Tambah Siswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('siswa.store') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Nama Siswa</label>
                                                <input type="text" name="nama" required class="form-control" id="nama" placeholder="Masukan Nama Siswa">
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Kelas</label>
                                                <select name="id_kelas" class="form-control" id="" required>
                                                    <option value="">-- Pilih Kelas --</option>
                                                    @foreach ($kelas as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Pilih Tanggal Masuk" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Tanggal Keluar</label>
                                                <input type="date" name="tanggal_keluar"  class="form-control" id="tanggal_keluar" placeholder="Pilih Tanggal Keluar">
                                            </div>
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" class="form-control" id="">
                                                    <option value="1" selected>Aktif</option>
                                                    <option value="0" >Nonaktif</option>
                                                </select>
                                            </div>                                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary ">Simpan</button>
                                        </form>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        {{-- tutup modal --}}
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                                                
                                        <th data-ordering="false">ID Siswa</th>
                                        <th data-ordering="false">Nama Siswa</th>
                                        <th data-ordering="false">Kelas</th>
                                        <th >Tanggal Masuk</th>
                                        <th >Tanggal Keluar</th>
                                        <th >Keterangan</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $s)
                                    <tr>                            
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->kelas->nama }}</td>
                                        <td>{{ $s->tanggal_masuk }}</td>
                                        <td>{{ $s->tanggal_keluar }}</td>
                                        <td>{{ $s->keterangan }}</td>                                                          
                                        <td><span class="badge badge-soft-{{ $s->status ? "info" : "warning" }}">
                                            @if ($s->status)
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
                                                    <li><a type="button" data-bs-toggle="modal" data-bs-target="#editSiswa-{{ $s->id }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteSiswa-{{ $s->id }}" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Default Modals -->
                                    <div id="editSiswa-{{ $s->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Siswa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('siswa.update', $s->id  ) }} " method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Nama Siswa</label>
                                                            <input type="text" name="nama" value="{{ $s->nama }}" required class="form-control" id="nama" placeholder="Masukan Nama Siswa">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Kelas</label>
                                                            <select name="id_kelas" class="form-control" id="" required>
                                                                <option value="">-- Pilih Kelas --</option>
                                                                @foreach ($kelas as $k)
                                                                <option value="{{ $k->id }}" @if($s->id_kelas == $k->id) selected @endif>{{ $k->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Tanggal Masuk</label>
                                                            <input type="date" name="tanggal_masuk" value="{{ $s->tanggal_masuk }}" class="form-control" id="tanggal_masuk" placeholder="Pilih Tanggal Masuk" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Tanggal Keluar</label>
                                                            <input type="date" name="tanggal_keluar" value="{{ $s->tanggal_keluar }}"  class="form-control" id="tanggal_keluar" placeholder="Pilih Tanggal Keluar">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="">{{ $s->keterangan }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select name="status" class="form-control" id="">
                                                                <option value="1" @if($s->status) selected @endif>Aktif</option>
                                                                <option value="0" @if(! $s->status) selected @endif>Nonaktif</option>
                                                            </select>
                                                        </div>                                                        
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary ">Simpan</button>
                                                    </form>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    {{-- delete modal --}}
                                    <div id="deleteSiswa-{{ $s->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Hapus Siswa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('siswa.delete', $s->id) }}" method="get">
                                                        @csrf
                                                        <p>Apa anda yakin ingin menghapus <b>{{ $s->nama }}</b> dari daftar siswa?</p>                                               
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger ">Hapus</button>
                                                    </form>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    
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