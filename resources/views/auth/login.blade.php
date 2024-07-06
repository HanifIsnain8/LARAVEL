<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('login') }}" class="h1"><b>MagangPlus</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Login Untuk Memulai</p>

        <form action="{{ route('login-proses') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          <small class="text-danger">{{ $message }}</small>
          @enderror

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
          </div>
        </form>

        <div class="social-auth-links text-center mt-2 mb-3">
          <a href="/auth/facebook" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Masuk Menggunakan Facebook
          </a>
          <a href="/auth/google" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Masuk Menggunakan Google
          </a>
        </div>

        <p class="mb-1">
          <a href="{{ route('password.request') }}">Lupa Password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Daftar</a>
        </p>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if ($message = Session::get('success'))
  <script>
    Swal.fire('{{ $message }}');
  </script>
  @endif

  @if ($message = Session::get('status'))
  <script>
    Swal.fire('{{ $message }}');
  </script>
  @endif

  @if ($message = Session::get('failed'))
  <script>
    Swal.fire('{{ $message }}');
  </script>
  @endif

</body>
</html>
