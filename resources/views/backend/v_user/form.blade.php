@extends('backend.v_layouts.app')
@section('content')
<!-- Wrapper Form Laporan User -->
<!-- template -->

<div class="row">
    <div class="col-12">
        <!-- Card Form Laporan User -->
        <div class="card">
            <!-- Form Cetak Laporan User -->
            <form class="form-horizontal" action="{{ route('backend.laporan.cetakuser') }}" method="post" target="_blank">
                @csrf

                <div class="card-body">
                    <h4 class="card-title"> {{$judul}} </h4>

                    <!-- Input Tanggal Awal -->
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" onkeypress="return hanyaAngka(event)" value="{{ old('tanggal_awal') }}" class="form-control @error('tanggal_awal') is-invalid @enderror" placeholder="Masukkan Jumlah Pinjam">
                        @error('tanggal_awal')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Input Tanggal Akhir -->
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" onkeypress="return hanyaAngka(event)" value="{{ old('tanggal_akhir') }}" class="form-control @error('tanggal_akhir') is-invalid @enderror" placeholder="Masukkan Jumlah Pinjam">
                        @error('tanggal_akhir')
                        <span class="invalid-feedback alert-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <br>
                    <!-- Tombol Cetak Laporan User -->
                    <button type="submit" class="btn btn-primary">Cetak</button>

            </form>
            <!-- End Form Cetak Laporan User -->
        </div>
    </div>
</div>

<!-- end template-->
<!-- End Wrapper Form Laporan User -->
@endsection
