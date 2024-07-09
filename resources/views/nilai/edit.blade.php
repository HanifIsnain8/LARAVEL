@extends('layout.app')

@section('title', 'Edit Nilai')

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
                                    <h2>EDIT NILAI</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('nilai.update', $nilai[0]->alternatif_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="alternatif_id">Alternatif</label>
                                    <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                                        @foreach($alternatif as $alt)
                                            <option value="{{ $alt->id }}" {{ $nilai[0]->alternatif_id == $alt->id ? 'selected' : '' }}>
                                                {{ $alt->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @php
                                    $kriteriaReverse = $kriteria->reverse();
                                @endphp
                                @foreach($kriteriaReverse as $kri)
                                    @php
                                        $selec = $nilai->firstWhere('kriteria_id', $kri->id);
                                    @endphp
                                    <div class="form-group">
                                        <label for="subs_kriteria_{{ $kri->id }}">{{ $kri->nama }}</label>
                                        <select name="penilaian[{{ $loop->index }}][subs_kriteria_id]" id="subs_kriteria_{{ $kri->id }}" class="form-control" required>
                                            @foreach($kri->subsKriteria as $sub)
                                                <option value="{{ $sub->id }}" 
                                                    {{ $selec && $selec->subs_kriteria_id == $sub->id ? 'selected' : '' }}>
                                                    {{ $sub->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="penilaian[{{ $loop->index }}][kriteria_id]" value="{{ $kri->id }}">
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Simpan</button>
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
