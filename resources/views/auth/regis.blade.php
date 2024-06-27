<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

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
      <a href="{{ route('login') }}" class="h1"><b>SPK</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Halaman Daftar</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
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
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
