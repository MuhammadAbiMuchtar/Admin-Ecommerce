@extends('backend.v_layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">{{$judul}}</h5>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('backend.kategori.create') }}" class="btn btn-primary radius-30">
                                <i class="bx bxs-plus-square"></i> Tambah Kategori
                            </a>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($index as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$row->nama_kategori}}</td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('backend.kategori.edit', $row->id) }}" class="btn btn-sm btn-primary me-2">
                                                    <i class="bx bxs-edit"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ route('backend.kategori.destroy', $row->id) }}" style="display: inline-block; margin-left: 5px;">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger show_confirm" data-konf-delete="{{ $row->nama_kategori}}">
                                                        <i class="bx bxs-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 