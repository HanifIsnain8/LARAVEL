@extends('layout.app')

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
                                    <h2>TAMBAH NILAI</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('nilai.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="alternatif_id">Alternatif</label>
                                    <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                                        @foreach($alternatifs as $alternatif)
                                            <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($kriterias as $kriteria)
                                    <div class="form-group">
                                        <label for="subs_kriteria_{{ $kriteria->id }}">{{ $kriteria->nama }}</label>
                                        <select name="subs_kriterias[{{ $kriteria->id }}]" id="subs_kriteria_{{ $kriteria->id }}" class="form-control" required>
                                            @foreach($kriteria->subsKriterias as $subs_kriteria)
                                                <option value="{{ $subs_kriteria->id }}">{{ $subs_kriteria->nama }}</option>
                                            @endforeach
                                        </select>
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
