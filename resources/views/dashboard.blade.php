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
