@extends('layout.app')

@section('title', 'Mahasiswa')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center mb">
                                <a class="btn btn-success" type="button" value="kembali" onclick="history.go(-1)">
                                    KEMBALI
                                </a>
                                <div class="mx-auto text-center">
                                    <h2>INFORMASI MAHASISWA</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $alt->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" name="gender" class="form-control" id="gender" value="{{ $alt->gender }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $alt->alamat }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $alt->no_hp }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ $alt->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" name="semester" class="form-control" id="semester" value="{{ $alt->semester }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $alt->jurusan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="asal_kampus" class="form-label">Institusi</label>
                                <input type="text" name="asal_kampus" class="form-control" id="asal_kampus" value="{{ $alt->asal_kampus }}" readonly>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
