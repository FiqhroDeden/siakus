@extends('layouts.app')
@section('content')
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Pengeluaran</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item">Transaksi</li>
                                <li class="breadcrumb-item active">Pengeluaran</li>
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
                                        <h5 class="card-title mb-0">Data Pengeluaran</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#tambahPengeluaran"><i class="ri-add-line align-bottom me-1"></i> Tambah Pengeluaran</button>
                                        
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        {{-- Modal Tambah Neraca --}}
                        <div id="tambahPengeluaran" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Tambah Pengeluaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pengeluaran.store') }}" method="post">
                                            @csrf
                                           
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="tanggal_pengeluaran" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">No Kontrak</label>
                                                <input type="text" class="form-control" name="no_kontrak" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Uraian</label>
                                                <textarea class="form-control" name="uraian" id="uraian" rows="3" placeholder=""></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Kategori</label>
                                                <select name="id_kategori" class="select2 form-select" id="" required>
                                                    <option value="">-- Pilih Kategori --</option>
                                                    @foreach ($kategori->where('jenis_kategori', '!=', 6)->where('jenis_kategori', '!=', 1) as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>    
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Jumlah Masuk</label>
                                                <input type="number" class="form-control" name="jumlah_masuk" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="VertimeassageInput" class="form-label">Jumlah Keluar</label>
                                                <input type="number" class="form-control" name="jumlah_pengeluaran" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label">Rekening</label>
                                                <select name="id_rekening" class="form-control" id="" required>
                                                    <option value="">-- Pilih --</option>
                                                    @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>    
                                                    @endforeach
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
                                        <th data-ordering="false">Tanggal</th>
                                        <th >Kode</th>                                        
                                        <th data-ordering="false">No Kontrak</th>                                        
                                        <th >Uraian</th>
                                        <th >Kategori</th>
                                        <th >Jumlah Masuk</th>
                                        <th >Jumlah Keluar</th>
                                        <th >Rekening</th>
                                        <th >Keterangan</th>                                        
                                        <th >Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($pengeluaran as $p)
                                    <tr>                            
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $p->tanggal_pengeluaran }}</td>
                                        <td>{{ $p->kode }}</td>                                    
                                        <td>{{ $p->no_kontrak }}</td>
                                        <td>{{ $p->uraian }}</td>
                                        <td>{{ $p->kategori->nama }}</td>
                                        <td>
                                            @if ($p->jumlah_masuk != null)
                                                Rp. {{ number_format($p->jumlah_masuk,2,',','.') }}
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($p->jumlah_pengeluaran,2,',','.') }}</td>
                                        <td>{{ $p->rekening->nama }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                                                                               
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">                                                
                                                    <li><a type="button" data-bs-toggle="modal" data-bs-target="#editPengeluaran-{{ $p->id }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                    <li>
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deletePengeluaran-{{ $p->id }}" class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Edit Modal --}}
                                    <div id="editPengeluaran-{{ $p->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Data Pengeluaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('pengeluaran.update', $p->id) }}" method="post">
                                                        @csrf
                                                    
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Tanggal</label>
                                                            <input type="date" class="form-control" value="{{ $p->tanggal_pengeluaran }}" name="tanggal_pengeluaran" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">No Kontrak</label>
                                                            <input type="text" class="form-control" value="{{ $p->no_kontrak }}" name="no_kontrak" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Uraian</label>
                                                            <textarea class="form-control" name="uraian" id="uraian" rows="3" placeholder="">{{ $p->uraian }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Kategori</label>
                                                            <select name="id_kategori" class="form-control" id="" required>
                                                                <option value="">-- Pilih Kategori --</option>
                                                                @foreach ($kategori->where('jenis_kategori', '!=', 6) as $k)
                                                                <option value="{{ $k->id }}" @if($p->id_kategori == $k->id) selected @endif>{{ $k->nama }}</option>    
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Jumlah Masuk</label>
                                                            <input type="number" class="form-control" value="{{ $p->jumlah_masuk }}" name="jumlah_masuk" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="VertimeassageInput" class="form-label">Jumlah Keluar</label>
                                                            <input type="number" class="form-control" value="{{ $p->jumlah_pengeluaran }}" name="jumlah_pengeluaran" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="employeeName" class="form-label">Rekening</label>
                                                            <select name="id_rekening" class="form-control" id="" required>
                                                                <option value="">-- Pilih --</option>
                                                                @foreach ($kategori->where('jenis_kategori', 1) as $k)
                                                                <option value="{{ $k->id }}" @if($p->id_rekening == $k->id) selected @endif>{{ $k->nama }}</option>    
                                                                @endforeach
                                                            </select>
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
                                    <div id="deletePengeluaran-{{ $p->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Hapus Data pengeluaran</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('pengeluaran.delete', $p->id) }}" method="get">
                                                        @csrf
                                                        <p>Apa anda yakin ingin menghapus data pengeluaran dengan kode <b>{{ $p->kode }}</b> ?</p>                                               
                                                    
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