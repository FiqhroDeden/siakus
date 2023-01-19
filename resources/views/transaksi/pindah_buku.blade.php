@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pindah Buku</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Transaksi</li>
                                <li class="breadcrumb-item active">Pindah Buku</li>
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
                                        <h5 class="card-title mb-0">Data Pindah Buku</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#tambahData"><i class="ri-add-line align-bottom me-1"></i> Tambah Data</button>
                                        
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        {{-- Modal Tambah Neraca --}}
                        <div id="tambahData" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pindah_buku.store') }}" method="post">
                                            @csrf
                                           
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal" required>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Dari Rekening</label>
                                                <select name="from" class="form-control" id="" required>
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>    
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Ke Rekening</label>
                                                <select name="to" class="form-control" id="" required>
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>    
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Jumlah </label>
                                                <input type="number" class="form-control" name="jumlah" required>
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
                                        <th data-ordering="false">Tanggal</th>                                    
                                        <th >Dari Rekening</th>
                                        <th >Ke Rekening</th>
                                        <th >Jumlah</th>                                    
                                        <th >Keterangan</th>                                        
                                        <th >Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($pindah_buku as $p)
                                    <tr>                            
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->from_e->nama }}</td>                                    
                                        <td>{{ $p->to_e->nama }}</td>
                                        <td>Rp. {{ number_format($p->jumlah,2,',','.') }}</td>                                    
                                        <td>{{ $p->keterangan }}</td>
                                                                                               
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">                                                
                                                    <li><a type="button" data-bs-toggle="modal" data-bs-target="#editData-{{ $p->id }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteData-{{ $p->id }}" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Edit Modal --}}
                                    <div id="editData-{{ $p->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Data Pindah Buku</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('pindah_buku.update', $p->id) }}" method="post">
                                                        @csrf
                                                    
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Tanggal</label>
                                                            <input type="date" class="form-control" value="{{ $p->tanggal }}" name="tanggal" required>
                                                        </div>
                                                    
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Dari Rekening</label>
                                                            <select name="from" class="form-control" id="" required>
                                                                <option value="">-- Pilih--</option>
                                                                @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                                <option value="{{ $k->id }}" @if($p->from == $k->id) selected @endif>{{ $k->nama }}</option>    
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Ke Rekening</label>
                                                            <select name="to" class="form-control" id="" required>
                                                                <option value="">-- Pilih--</option>
                                                                @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                                <option value="{{ $k->id }}" @if($p->to == $k->id) selected @endif>{{ $k->nama }}</option>    
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Jumlah </label>
                                                            <input type="number" class="form-control" value="{{ $p->jumlah }}" name="jumlah" required>
                                                        </div>                                            
                                                                                                
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Keterangan</label>
                                                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="">{{ $p->keterangan }}</textarea>
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
                                    <div id="deleteData-{{ $p->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Hapus Data Pindah Buku</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('pindah_buku.delete', $p->id) }}" method="get">
                                                        @csrf
                                                        <p>Apa anda yakin ingin menghapus data Pindah Buku ini?
                                                        </p>                                               
                                                    
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