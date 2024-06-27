<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<div class="container">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Verifikasi baru telah dikirim ke alamat email Anda.
        </div>
    @endif

    <div class="alert alert-warning" role="alert">
        Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
        Jika Anda tidak menerima email tersebut,
        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clik disini untuk meminta tautann lain </button>.
        </form>
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

@if ($message = Session::get('success'))
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
