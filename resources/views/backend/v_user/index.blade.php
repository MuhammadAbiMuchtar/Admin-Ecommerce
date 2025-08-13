@extends('backend.v_layouts.app') 
@section('content') 
<!-- Wrapper Daftar User -->
<!-- contentAwal --> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card Daftar User -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$judul}}</h4>
                    <div class="card-tools">
                        <!-- Tombol Tambah User -->
                        <a href="{{ route('backend.user.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Tabel daftar user -->
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>HP</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($row->foto)
                                            <img src="{{ asset('storage/img-user/' . $row->foto) }}" alt="Foto User" style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                                        @else
                                            <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="Foto User" style="width:40px; height:40px; object-fit:cover; border-radius:50%;">
                                        @endif
                                    </td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->hp }}</td>
                                    <td>
                                        @if ($row->role == 1)
                                            <span class="badge bg-success text-white">Super Admin</span>
                                        @elseif($row->role == 0)
                                            <span class="badge bg-primary text-white">Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->status ==1)
                                            <span class="badge bg-success text-white">Aktif</span>
                                        @elseif($row->status ==0)
                                            <span class="badge bg-secondary text-white">NonAktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <!-- Tombol Edit User -->
                                            <a href="{{ route('backend.user.edit', $row->id) }}" class="btn btn-primary btn-sm" title="Ubah Data">
                                                <i class="far fa-edit"></i> Ubah
                                            </a>
                                            <!-- Tombol Hapus User -->
                                            <form method="POST" action="{{ route('backend.user.destroy', $row->id) }}" style="display: inline-block; margin-left: 10px;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm" data-konf-delete="{{ $row->nama }}" title='Hapus Data'>
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Tabel Data User -->
                    </div>
                </div>
            </div>
            <!-- End Card Daftar User -->
        </div>
    </div>
</div>
<!-- contentAkhir --> 
<!-- End Wrapper Daftar User -->
@endsection