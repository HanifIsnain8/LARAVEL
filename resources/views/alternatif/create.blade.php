@extends('layout.app')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid"  style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary"">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center mb">
                                <a class="btn btn-success" type="button" value="kembali" onclick="history.go(-1)">
                                    KEMBALI
                                </a>
                                <div class="mx-auto text-center">
                                    <h2>TAMBAH MAHASISWA</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('alternatif.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="LAKI - LAKI">LAKI - LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" maxlength="15" placeholder="Masukan Nomor HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" maxlength="50" placeholder="Masukan Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" name="semester" class="form-control" id="semester" maxlength="2" placeholder="Masukan Semester" required>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" id="jurusan" maxlength="30" placeholder="Masukan Jurusan" required>
                                </div>
                                <div class="form-group">
                                    <label for="asal_kampus" class="form-label">Institusi</label>
                                    <input type="text" name="asal_kampus" class="form-control" id="asal_kampus" maxlength="50" placeholder="Masukan Asal Institusi" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
