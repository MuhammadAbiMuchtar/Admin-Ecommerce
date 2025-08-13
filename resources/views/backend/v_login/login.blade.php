<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('image\LogoEcommerce.png') }}">
    <!-- Mengatur favicon untuk halaman login -->
    <title>Login - Admin Ecommerce</title>
    <!-- Judul halaman -->
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/simplebar.css') }}">
    <!-- Memuat file CSS untuk tampilan scrollbar -->
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Memuat font dari Google Fonts -->
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/feather.css') }}">
    <!-- Memuat ikon Feather untuk tampilan -->
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/daterangepicker.css') }}">
    <!-- Memuat CSS untuk date range picker -->
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('Backend/092 tinydash-master/light/css/app-dark.css') }}" id="darkTheme" disabled>
    <!-- Memuat tema terang dan gelap -->
  </head>
  <body class="light">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <!-- Form Login Admin -->
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('backend.login') }}" method="post">
          @csrf
          <!-- Logo Ecommerce -->
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
            <img src="{{ asset('image\LogoEcommerce.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
          </a>
          <h1 class="h6 mb-3">LOGIN ADMIN ECOMMERCE</h1>
          <!-- Judul Form Login -->
          
          @if(session()->has('error'))
          <!-- Pesan error jika login gagal -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ session('error')}}</strong>
          </div>
          @endif

          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                   placeholder="Email address" value="{{old('email')}}" required autofocus>
            <!-- Input email admin -->
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                   placeholder="Password" required>
            <!-- Input password admin -->
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="mb-0">
              <input type="checkbox" value="remember-me"> Ingat saya
            </label>
            <!-- Checkbox untuk mengingat login -->
            <a href="#" class="btn btn-link" data-toggle="modal" data-target="#resetPasswordModal">Lupa Password?</a>
            <!-- Link untuk membuka modal reset password -->
          </div>
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          <!-- Tombol submit login -->
          
          <p class="mt-5 mb-3 text-muted">&copy; 2025</p>
          <!-- Copyright -->
        </form>
      </div>
    </div>

    <!-- Modal Reset Password -->
    <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resetPasswordModalLabel">Reset Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('backend.reset-password') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="resetEmail">Email</label>
                <input type="email" class="form-control" id="resetEmail" name="email" required placeholder="Masukkan email Anda">
                <!-- Input email untuk reset password -->
              </div>
              <button type="submit" class="btn btn-primary">Kirim Link Reset Password</button>
              <!-- Tombol kirim link reset password -->
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.min.js') }}"></script>
    <!-- Memuat library jQuery -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/popper.min.js') }}"></script>
    <!-- Memuat library Popper.js untuk Bootstrap -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/moment.min.js') }}"></script>
    <!-- Memuat library Moment.js untuk manipulasi tanggal -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/bootstrap.min.js') }}"></script>
    <!-- Memuat library Bootstrap JS -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/simplebar.min.js') }}"></script>
    <!-- Memuat plugin Simplebar -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/daterangepicker.js') }}"></script>
    <!-- Memuat plugin Date Range Picker -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/jquery.stickOnScroll.js') }}"></script>
    <!-- Memuat plugin sticky scroll -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/tinycolor-min.js') }}"></script>
    <!-- Memuat plugin TinyColor -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/config.js') }}"></script>
    <!-- Memuat konfigurasi aplikasi -->
    <script src="{{ asset('Backend/092 tinydash-master/light/js/apps.js') }}"></script>
    <!-- Memuat script utama aplikasi -->
  </body>
</html>