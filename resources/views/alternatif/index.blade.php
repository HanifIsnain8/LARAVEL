@extends('layout.app')

@section('title', 'Mahasiswa')

@section('content')
<div class="content-wrapper">
    {{-- Uncomment this section if you want to display the content header --}}
    {{-- <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>ALTERNATIF</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Legacy User Menu</li>
              </ol>
            </div>
          </div>
        </div>
    </section> --}}
    
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center mb">
                                <div class="mx-auto text-center">
                                    <h2>DATA MAHASISWA</h2>
                                </div>
                                <a href="{{ route('alternatif.create') }}" class="btn btn-primary" type="button">
                                    TAMBAH
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="alternatifTable" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Semester</th>
                                        <th>Jurusan</th>
                                        <th>Institusi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatif as $alt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alt->nama }}</td>
                                            <td>{{ $alt->semester }}</td>
                                            <td>{{ $alt->jurusan }}</td>
                                            <td>{{ $alt->asal_kampus }}</td>
                                            <td>
                                                <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Delete</button>
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
    </section>
</div>
@endsection   
