@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Laba Rugi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Laba Rugi</li>
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
                                        <h5 class="card-title mb-0">Daftar Laba Rugi</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#tambahLabaRugi"><i class="ri-add-line align-bottom me-1"></i> Tambah Laba Rugi</button>
                                        
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        {{-- Modal Tambah Laba Rugi --}}
                        <div id="tambahLabaRugi" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Tambah Laba Rugi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('laba_rugi.store') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Nama</label>
                                                <input type="text" name="nama" required class="form-control" id="nama" placeholder="Masukan Nama">
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Jenis Laba Rugi</label>
                                                <select name="jenis_kategori" class="form-control" id="" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="6">Pendapatan</option>
                                                    <option value="7">Pengeluaran</option>
                                                 
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
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
                                                                
                                        <th data-ordering="false">No</th>
                                        <th data-ordering="false">Nama</th>
                                        <th data-ordering="false">Jenis</th>
                                        <th >Keterangan</th>
                                        
                                        {{-- <th >Action</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1 ?>
                                    @foreach ($laba_rugi as $l)
                                    <tr>                            
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $l->nama }}</td>
                                        <td>
                                            @if ($l->jenis_kategori == 6)
                                                Pendapatan                                            
                                            @else
                                                Pengeluaran
                                            @endif
                                        </td>
                                        <td>{{ $l->keterangan }}</td>
                                                                                               
                                        {{-- <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">                                                
                                                    <li><a type="button" data-bs-toggle="modal" data-bs-target="#editLabaRugi-{{ $l->id }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteLabaRugi-{{ $l->id }}" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    <!-- Default Modals -->
                                    <div id="editLabaRugi-{{ $l->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Laba Rugi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('laba_rugi.update', $l->id  ) }} " method="post">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Nama</label>
                                                            <input type="text" name="nama" value="{{ $l->nama }}" required class="form-control" id="nama" placeholder="Masukan Nama" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Jenis Laba Rugi</label>
                                                            <select name="jenis_kategori" class="form-control" id="" required>
                                                                <option value="">-- Pilih --</option>
                                                                <option value="6" @if($l->jenis_kategori == 6) selected @endif>Pendapatan</option>
                                                                <option value="7" @if($l->jenis_kategori == 7) selected @endif>Pengeluaran</option>
                                                               
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="">{{ $l->keterangan }}</textarea>
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
                                    <div id="deleteLabaRugi-{{ $l->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Hapus LabaRugi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('laba_rugi.delete', $l->id) }}" method="get">
                                                        @csrf
                                                        <p>Apa anda yakin ingin menghapus <b>{{ $l->nama }}</b> dari daftar Laba Rugi?</p>                                               
                                                    
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