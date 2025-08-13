<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tags dan informasi dasar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/LogoEcommerce.png') }}">
    <title>Admin Ecommerce</title>

    <!-- CSS Dasar -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/simplebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- CSS Komponen -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/daterangepicker.css') }}">
    
    <!-- CSS Tema -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/app-dark.css') }}" id="darkTheme" disabled>
    <!-- FontAwesome 5 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyZtM3C6QJb6jVWeItPxX2VINeodIZ6Tn6PvxI6Bfq5lHppZArYdS4x+hRbFGk3jfbQ3VIAtF5pP7k+gf2k6hQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body class="vertical light">
    <div class="wrapper">
      <!-- Navbar Atas -->
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                @if (Auth::check() && Auth::user()->foto)
                <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user" class="avatar-img rounded-circle">
                @else
                <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="user" class="avatar-img rounded-circle">
                @endif
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="@if(Auth::check()){{ route('backend.user.edit', Auth::user()->id) }}@else#@endif">Profil Saya</a>
              <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">Keluar</a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Sidebar Kiri -->
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- Logo -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('backend.beranda') }}">
              <img src="{{ asset('image/LogoEcommerce.png') }}" alt="Logo" class="navbar-brand-img brand-sm" id="logoImage" style="width: 50px; height: auto;">
            </a>
          </div>

          <!-- Menu Navigasi -->
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
              <a href="{{ route('backend.beranda') }}" class="nav-link {{ request()->routeIs('backend.beranda') ? 'active' : '' }}">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>

          <!-- Menu Manajemen Kategori Dan Produk -->
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Manajemen Kategori Dan Produk</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('backend.kategori.*') ? 'active' : '' }}" href="{{ route('backend.kategori.index') }}">
                <i class="fe fe-tag fe-16"></i>
                <span class="ml-3 item-text">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('backend.produk.*') ? 'active' : '' }}" href="{{ route('backend.produk.index') }}">
                <i class="fe fe-shopping-bag fe-16"></i>
                <span class="ml-3 item-text">Produk</span>
              </a>
            </li>
          </ul>

          <!-- Menu Manajemen User -->
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Manajemen User</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('backend.user.*') ? 'active' : '' }}" href="{{ route('backend.user.index') }}">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Data User</span>
              </a>
            </li>
          </ul>

          <!-- Menu Laporan -->
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Laporan</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('backend.laporan.user') ? 'active' : '' }}" href="{{ route('backend.laporan.user') }}">
                <i class="fe fe-file-text fe-16"></i>
                <span class="ml-3 item-text">Laporan User</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('backend.laporan.produk') ? 'active' : '' }}" href="{{ route('backend.laporan.produk') }}">
                <i class="fe fe-package fe-16"></i>
                <span class="ml-3 item-text">Laporan Produk</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>

      <!-- Konten Utama -->
      <main role="main" class="main-content">
        <div class="container-fluid">
          @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @yield('content')
        </div>
      </main>
    </div>

    <!-- JavaScript Dasar -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/popper.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/moment.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/config.js') }}"></script>

    <!-- JavaScript Komponen -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/select2.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/uppy.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/quill.min.js') }}"></script>
    <script src="{{ asset('Backend/092 tinydash-master/light/js/apps.js') }}"></script>

    <!-- Form Keluar -->
    <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="d-none">
      @csrf
    </form>

    <!-- SweetAlert -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>

    <!-- Notifikasi Sukses -->
    @if (session('success')) 
    <script> 
      Swal.fire({ 
        icon: 'success', 
        title: 'Berhasil!', 
        text: "{{ session('success') }}" 
      }); 
    </script> 
    @endif

    <!-- Konfirmasi Hapus -->
    <script type="text/javascript">
      $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var konfdelete = $(this).data("konf-delete");
        event.preventDefault();
        Swal.fire({
          title: 'Konfirmasi Hapus Data?',
          html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, dihapus',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
              .then(() => {
                form.submit();
              });
          }
        });
      });
    </script>

    <!-- Preview Foto -->
    <script>
      function previewFoto(){
        const foto = document.querySelector('input[name="foto"]');
        const fotoPreview = document.querySelector('.foto-preview');
        fotoPreview.style.display = 'block';
        const fotoReader = new FileReader();
        fotoReader.readAsDataURL(foto.files[0]);
        fotoReader.onload = function(fotoEvent){
          fotoPreview.src = fotoEvent.target.result;
          fotoPreview.style.width = '100%';
        }
      }
    </script>

    <!-- CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
      ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .catch(error => {
          console.error(error);
        });
    </script>

    <!-- Script Pengaturan Sidebar -->
    <script>
      $(document).ready(function() {
        // Inisialisasi sidebar
        $('.left-sidebar').removeClass('collapsed');
        $('.main-content').removeClass('expanded');

        // Toggle sidebar
        $('.collapseSidebar').click(function() {
          $('.left-sidebar').toggleClass('collapsed');
          $('.main-content').toggleClass('expanded');
        });
      });
    </script>
  </body>
</html>