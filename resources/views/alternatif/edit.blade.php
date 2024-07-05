@extends('layout.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center mb">
                                <div class="mx-auto text-center">
                                    <h2>EDIT MAHASISWA</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $alternatif->nama }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" id="gender" required>
                                        <option value="LAKI - LAKI" {{ $alternatif->gender == 'LAKI - LAKI' ? 'selected' : '' }}>LAKI - LAKI</option>
                                        <option value="PEREMPUAN" {{ $alternatif->gender == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $alternatif->alamat }}" maxlength="100" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $alternatif->no_hp }}" maxlength="15" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ $alternatif->email }}" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" name="semester" class="form-control" id="semester" value="{{ $alternatif->semester }}" maxlength="2" required>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $alternatif->jurusan }}" maxlength="30" required>
                                </div>
                                <div class="form-group">
                                    <label for="asal_kampus" class="form-label">Institusi</label>
                                    <input type="text" name="asal_kampus" class="form-control" id="asal_kampus" value="{{ $alternatif->asal_kampus }}" maxlength="50" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
