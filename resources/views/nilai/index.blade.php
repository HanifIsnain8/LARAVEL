@extends('layout.app')

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
                                    <h2>NILAI</h2>
                                </div>
                                <a href="{{ route('nilai.create') }}" class="btn btn-primary" type="button">
                                    TAMBAH
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                            <th>{{ $kriteria->kode }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->nama }}</td>
                                            @foreach($kriterias as $kriteria)
                                                @php
                                                    $nilai = $nilais->where('alternatif_id', $alternatif->id)
                                                                    ->where('kriteria_id', $kriteria->id)
                                                                    ->first();
                                                @endphp
                                                <td>{{ $nilai ? $nilai->nilai : '-' }}</td>
                                            @endforeach
                                            <td>
                                                <a href="{{ route('nilai.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('nilai.destroy', $alternatif->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus nilai ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- <!-- Normalization Table -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="mx-auto text-center">
                                <h2>NORMALISASI (TOPSIS)</h2>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                            <th>{{ $kriteria->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>{{ $alternatif->nama }}</td>
                                            @foreach($kriterias as $kriteria)
                                                <td>{{ isset($normalizedMatrix[$alternatif->id][$kriteria->id]) ? number_format($normalizedMatrix[$alternatif->id][$kriteria->id], 4) : '-' }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>  
</div>
@endsection
