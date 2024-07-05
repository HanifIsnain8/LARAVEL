<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK Penerimaan Mahasiswa Magang - Metode TOPSIS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <a href="#" class="navbar-brand">
      <span class="brand-text font-weight-light">SPK Penerimaan Mahasiswa Magang</span>
    </a>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <div class="container">
      <h1>Selamat Datang di SPK Penerimaan Mahasiswa Magang</h1>
      <p>Sistem Pendukung Keputusan menggunakan Metode TOPSIS</p>
      <a href="{{ route('login') }}" class="btn btn-primary">Mulai Sekarang</a>
    </div>
  </div>

</div>

<!-- jQuery -->
<script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
