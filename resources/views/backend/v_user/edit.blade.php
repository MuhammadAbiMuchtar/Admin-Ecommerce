@extends('backend.v_layouts.app')

@section('content')
<!-- Wrapper Edit User -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card Edit User -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$judul}}</h4>
                </div>
                <!-- Form Edit User -->
                <form action="{{ route('backend.user.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Input Foto User -->
                                <div class="form-group">
                                    <label class="form-label">Foto</label>
                                    <div class="mb-3">
                                        @if ($edit->foto)
                                            <img src="{{ asset('storage/img-user/' . $edit->foto) }}" class="foto-preview img-fluid rounded" style="max-width: 200px;">
                                        @else
                                            <img src="{{ asset('storage/img-user/img-default.jpg') }}" class="foto-preview img-fluid rounded" style="max-width: 200px;">
                                        @endif
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
                                        <option value="" {{ old('role', $edit->role) == '' ? 'selected' : '' }}> - Pilih Hak Akses -</option>
                                        <option value="1" {{ old('role', $edit->role) == '1' ? 'selected' : '' }}>Super Admin</option>
                                        <option value="0" {{ old('role', $edit->role) == '0' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Status User -->
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="" {{ old('status', $edit->status) == '' ? 'selected' : '' }}> - Pilih Status -</option>
                                        <option value="1" {{ old('status', $edit->status) == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status', $edit->status) == '0' ? 'selected' : '' }}>NonAktif</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Nama User -->
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" value="{{ old('nama', $edit->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input Email User -->
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $edit->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Input HP User -->
                                <div class="form-group">
                                    <label class="form-label">HP</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" name="hp" value="{{ old('hp', $edit->hp) }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan Nomor HP">
                                    @error('hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Aksi Edit User -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Perbaharui
                        </button>
                        <a href="{{ route('backend.user.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
                <!-- End Form Edit User -->
            </div>
            <!-- End Card Edit User -->
        </div>
    </div>
</div>
<!-- End Wrapper Edit User -->
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