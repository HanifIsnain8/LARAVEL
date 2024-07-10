@extends('layout.app')

@section('title', 'Home')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Legacy User Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Legacy User Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $alt }}</h3>

              <p>Data Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('alternatif.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $kri }}</h3>

              <p>Data Kriteria</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('kriteria.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $nilai }}</h3>

              <p>Data penilaian</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('nilai.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
    <!-- Panduan Section -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Panduan Penggunaan</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <h5>1. Mengelola Data Mahasiswa</h5>
              <p>Untuk mengelola data Mahasiswa, klik tombol "More info" pada bagian Data Alternatif. Anda akan diarahkan ke halaman pengelolaan data alternatif di mana Anda bisa menambahkan, mengedit, atau menghapus data alternatif.</p>
              
              <h5>2. Mengelola Data Kriteria</h5>
              <p>Untuk mengelola data alternatif, klik tombol "More info" pada bagian Data Alternatif. Anda akan diarahkan ke halaman pengelolaan data alternatif di mana Anda bisa menambahkan, mengedit, atau menghapus data alternatif.</p>
              
              <h5>3. Mengelola Data Penilaian</h5>
              <p>Untuk mengelola data penilaian, klik tombol "More info" pada bagian Data Penilaian. Pastikan sudah menambahkan data kriteria sebelum mengelola data nilai.</p>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

@if ($message = Session::get('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Success',
            text: '{{ $message }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>
@endif


@endsection
