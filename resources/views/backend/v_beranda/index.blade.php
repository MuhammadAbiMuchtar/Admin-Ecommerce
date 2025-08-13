@extends('backend.v_layouts.app') 
@section('content') 
<!-- Wrapper utama dashboard -->
<div class="d-flex flex-column min-vh-100">
  <div class="flex-fill">
    <!-- Konten Awal --> 
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <!-- Header Selamat Datang dan Role User -->
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class="h5 page-title">
                Selamat Datang, {{ Auth::user()->nama }}!
                <small class="d-block mt-1">
                  @if(Auth::user()->role == 0)
                    (Admin)
                  @elseif(Auth::user()->role == 1)
                    (Superadmin)
                  @else
                    (User)
                  @endif
                </small>
              </h2>
            </div>
          </div>
          <!-- Statistik Card: Menampilkan total kategori, produk, dan user -->
          <div class="row mb-4">
            <div class="col-md-4 mb-3">
              <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                  <div class="mr-3">
                    <i class="fe fe-tag text-primary" style="font-size: 2.5rem;"></i>
                  </div>
                  <div>
                    <h6 class="mb-0">Total Kategori</h6>
                    <h3 class="mb-0">{{ $totalKategori }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                  <div class="mr-3">
                    <i class="fe fe-shopping-bag text-success" style="font-size: 2.5rem;"></i>
                  </div>
                  <div>
                    <h6 class="mb-0">Total Produk</h6>
                    <h3 class="mb-0">{{ $totalProduk }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card shadow border-0">
                <div class="card-body d-flex align-items-center">
                  <div class="mr-3">
                    <i class="fe fe-user text-warning" style="font-size: 2.5rem;"></i>
                  </div>
                  <div>
                    <h6 class="mb-0">Total User</h6>
                    <h3 class="mb-0">{{ $totalUser }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Konten Akhir --> 
  </div>
  <!-- Footer sederhana -->
  <div class="bg-white border rounded shadow-sm mx-3 my-2 py-3 px-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
        <span class="fw-bold" style="color: #007bff; font-weight: bold;">2025</span>
        <span class="fw-bold" style="color: #28a745; font-weight: bold;">E-Commerce</span>
      </div>
    </div>
  </div>
</div>
@endsection