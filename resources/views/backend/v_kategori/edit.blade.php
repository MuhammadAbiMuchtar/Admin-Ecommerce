<!-- Layout Utama -->
@extends('backend.v_layouts.app')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <!-- Card Edit Kategori -->
                <div class="card">
                    <div class="card-body">
                        <!-- Header Judul Halaman -->
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">{{ $judul }}</h5>
                            </div>
                        </div>
                        <hr/>
                        <!-- Form Edit Kategori -->
                        <form action="{{ route('backend.kategori.update', $edit->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" 
                                       name="nama_kategori" 
                                       value="{{ old('nama_kategori', $edit->nama_kategori) }}" 
                                       class="form-control @error('nama_kategori') is-invalid @enderror" 
                                       placeholder="Masukkan Nama Kategori">
                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-4">Perbaharui</button>
                                <a href="{{ route('backend.kategori.index') }}" class="btn btn-secondary px-4">Kembali</a>
                            </div>
                        </form>
                        <!-- End Form Edit Kategori -->
                    </div>
                </div>
                <!-- End Card Edit Kategori -->
            </div>
        </div>
    </div>
</div>
<!-- End Page Wrapper -->
@endsection