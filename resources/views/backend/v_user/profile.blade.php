@extends('backend.v_layouts.app')

@section('content')
<!-- Tampilan profil user -->
<div class="row">
    <div class="col-md-12">
        <!-- Card Profil User -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h4 class="card-title">Profil Saya</h4>
            </div>
            <div class="card-body">
                <!-- Form Update Profil User -->
                <form action="{{ route('backend.user.update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Input Foto Profil -->
                            <div class="form-group">
                                <label for="foto">Foto Profil</label>
                                <div class="mb-3">
                                    @if (Auth::user()->foto)
                                    <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="Foto Profil" class="img-thumbnail foto-preview" style="max-width: 200px;">
                                    @else
                                    <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="Foto Profil" class="img-thumbnail foto-preview" style="max-width: 200px;">
                                    @endif
                                </div>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewFoto()">
                                @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!-- Input Nama Profil -->
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input Email Profil -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input Password Baru -->
                            <div class="form-group">
                                <label for="password">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input Konfirmasi Password Baru -->
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
                <!-- End Form Update Profil User -->
            </div>
        </div>
        <!-- End Card Profil User -->
    </div>
</div>
<!-- End Wrapper Profil User -->
@endsection 