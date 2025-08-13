@extends('backend.v_layouts.app')

@section('content')
<!-- contentAwal -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Judul Halaman -->
                <h5 class="card-title">{{ $judul }}</h5>
                <!-- Tombol Tambah Produk Baru -->
                <a href="{{ route('backend.produk.create') }}" class="mb-3 d-inline-block">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </a>
                <div class="table-responsive">
                    <!-- Tabel Daftar Produk -->
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Nama Produk</th>
                                <th>Gambar</th>
                                <th>Detail Produk</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($index as $row)
                            <tr>
                                <!-- Nomor Urut -->
                                <td>{{ $loop->iteration }}</td>
                                <!-- Nama Kategori Produk -->
                                <td>{{ $row->kategori->nama_kategori }}</td>
                                <!-- Status Produk (Publis/Blok) -->
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge badge-success">Publis</span>
                                    @elseif($row->status == 0)
                                        <span class="badge badge-secondary">Blok</span>
                                    @endif
                                </td>
                                <!-- Nama Produk -->
                                <td>{{ $row->nama_produk }}</td>
                                <!-- Gambar Utama dan Gambar Tambahan Produk -->
                                <td>
                                    @if($row->foto)
                                        <img src="{{ asset('storage/img-produk/' . $row->foto) }}" width="80" height="80" style="object-fit:cover;">
                                    @else
                                        <img src="{{ asset('storage/img-produk/imgdefault.jpg') }}" width="80" height="80" style="object-fit:cover;">
                                    @endif
                                    @if($row->fotoProduk && count($row->fotoProduk))
                                        <div style="margin-top:5px;">
                                            @foreach($row->fotoProduk as $fotoTambahan)
                                                <img src="{{ asset('storage/img-produk/' . $fotoTambahan->foto) }}" width="80" height="" style="object-fit:cover; margin-right:2px; border:1px solid #eee;">
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <!-- Ringkasan Detail Produk -->
                                <td>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($row->detail), 50, '...') }}
                                </td>
                                <!-- Harga Produk -->
                                <td>Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                <!-- Berat Produk dan Satuan -->
                                <td>
                                    {{ $row->berat }}
                                    @if($row->satuan_berat == 'gr' || $row->satuan_berat == 'kg')
                                        {{ $row->satuan_berat }}
                                    @endif
                                </td>
                                <!-- Stok Produk -->
                                <td>{{ $row->stok }}</td>
                                <!-- Tombol Aksi: Edit, Tambah Gambar, Hapus -->
                                <td>
                                    <!-- Tombol Edit Produk -->
                                    <a href="{{ route('backend.produk.edit', $row->id) }}" title="Ubah Data">
                                        <button type="button" class="btn btn-primary btn-sm me-1 mb-1">
                                            <i class="far fa-edit"></i> Ubah
                                        </button>
                                    </a>
                                    <!-- Tombol Tambah Gambar Produk -->
                                    <a href="{{ route('backend.produk.show', $row->id) }}" title="Ubah Data">
                                        <button type="button" class="btn btn-warning btn-sm text-white me-1 mb-1">
                                            <i class="fas fa-plus"></i> Gambar
                                        </button>
                                    </a>
                                    <!-- Form Hapus Produk dengan Konfirmasi -->
                                    <form method="POST" action="{{ route('backend.produk.destroy', $row->id) }}" style="display: inline-block;">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm show_confirm me-1 mb-1" data-konf-delete="{{ $row->nama }}" title="Hapus Data">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
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
<!-- contentAkhir -->
@endsection
