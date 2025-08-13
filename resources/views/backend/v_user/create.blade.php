@extends('backend.v_layouts.app') 
@section('content') 
<!-- Wrapper Tambah User -->
<!-- contentAwal --> 
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card Tambah User -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$judul}}</h4>
                </div>
                <!-- Form Tambah User -->
                <form class="form-horizontal" action="{{ route('backend.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Input Foto User -->
                                <div class="form-group">
                                    <label class="form-label">Foto</label>
                                    <div class="mb-3">
                                        <img class="foto-preview img-fluid rounded" style="max-width: 200px;">
                                    </div>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewFoto()">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <!-- Input Hak Akses -->
                                <div class="form-group">
                                    <label class="form-label">Hak Akses</label>
                                    <select name="role" class="form-select @error('role') is-invalid @enderror">
                                        <option value="" {{ old('role') == '' ? 'selected' : '' }}> - Pilih Hak Akses - </option>
                                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}> Super Admin</option>
                                        <option value="0" {{ old('role') == '0' ? 'selected' : '' }}> Admin </option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Nama User -->
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Email User -->
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input HP User -->
                                <div class="form-group">
                                    <label class="form-label">HP</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" name="hp" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan Nomor HP">
                                    @error('hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Password User -->
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Konfirmasi Password User -->
                                <div class="form-group">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Simpan dan Kembali -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('backend.user.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
                <!-- End Form Tambah User -->
            </div>
            <!-- End Card Tambah User -->
        </div>
    </div>
</div>
<!-- contentAkhir --> 
<!-- End Wrapper Tambah User -->
@endsection

@push('scripts')
<script>
function previewFoto() {
    const foto = document.querySelector('input[name="foto"]');
    const fotoPreview = document.querySelector('.foto-preview');
    
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    
    fileFoto.onload = function(e) {
        fotoPreview.src = e.target.result;
    }
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
@endpush 