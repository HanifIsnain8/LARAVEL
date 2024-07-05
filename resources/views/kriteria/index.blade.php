@extends('layout.app')

@section('title', 'Kriteria')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center mb">
                                <div class="mx-auto text-center">
                                    <h2>KRITERIA</h2>
                                </div>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahModal">
                                    TAMBAH
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="kriteriaTable" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Tipe Kriteria</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kriterias as $kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kriteria->kode }}</td>
                                        <td>{{ $kriteria->nama }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>{{ ucfirst($kriteria->tipe_kriteria) }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#subsModal{{ $kriteria->id }}">
                                                <i class="fas fa-list"></i> SUBS KRITERIA
                                            </button>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $kriteria->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus kriteria ini?')">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
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

<!-- Modal Tambah Kriteria -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">TAMBAH KRITERIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambahform" action="{{ route('kriteria.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control" id="kode" maxlength="5" placeholder="Masukan Kode seperti C1,C2" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kriteria</label>
                        <input type="text" name="nama" class="form-control" id="nama" maxlength="30" placeholder="Masukan Nama Kriteria" required>
                    </div>
                    <div class="mb-3">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="number" name="bobot" class="form-control" id="bobot" max="5" placeholder="Bobot Maksimal 5" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_kriteria" class="form-label">Tipe Kriteria</label>
                        <select name="tipe_kriteria" class="form-control" id="tipe_kriteria" required>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($kriterias as $kriteria)
<!-- Modal Edit Kriteria -->
<div class="modal fade" id="editModal{{ $kriteria->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kriteria->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $kriteria->id }}">Edit Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control" id="kode" value="{{ $kriteria->kode }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Kriteria</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $kriteria->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bobot" class="form-label">Bobot</label>
                        <input type="number" name="bobot" class="form-control" id="bobot" value="{{ $kriteria->bobot }}" max="5" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe_kriteria" class="form-label">Tipe Kriteria</label>
                        <select name="tipe_kriteria" class="form-control" id="tipe_kriteria" required>
                            <option value="benefit" {{ $kriteria->tipe_kriteria == 'benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="cost" {{ $kriteria->tipe_kriteria == 'cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal untuk edit sub-kriteria -->
<div class="modal fade" id="subsModal{{ $kriteria->id }}" tabindex="-1" role="dialog" aria-labelledby="subsModalLabel{{ $kriteria->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('subs_kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="subsModalLabel{{ $kriteria->id }}">SUBS KRITERIA {{ $kriteria->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($kriteria->subsKriteria as $sub)
                    <div class="form-group">
                        <label for="subs_nama[]_{{ $sub->id }}">Nilai {{ $sub->nilai }}:</label>
                        <input type="text" class="form-control" name="subs_nama[]" value="{{ $sub->nama }}" required>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endforeach

@endsection
