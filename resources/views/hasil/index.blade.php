@extends('layout.app')

@section('title', 'Hasil')
@section('css')
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">

                    <!-- Normalisasi -->
                    <div class="card">
                        <div class="card-header">
                            <div class="mx-auto text-center">
                                <h2>NORMALISASI</h2>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="normalisasi" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
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
                                                <td>{{ isset($normalizedMatrix[$alternatif->id][$kriteria->id]) ? $normalizedMatrix[$alternatif->id][$kriteria->id] : '-' }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Normalisasi Terbobot -->
                    <div class="card">
                        <div class="card-header">
                            <div class="mx-auto text-center">
                                <h2>NORMALISASI TERBOBOT</h2>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="terbobot" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
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
                                                <td>{{ isset($weightedNormalizedMatrix[$alternatif->id][$kriteria->id]) ? $weightedNormalizedMatrix[$alternatif->id][$kriteria->id] : '-' }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- NILAI IDEAL -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="mx-auto text-center">
                                <h2>NILAI IDEAL</h2>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="ideal" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        @foreach($kriterias as $kriteria)
                                            <th>{{ $kriteria->kode }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ideal Positif</td>
                                        @foreach($kriterias as $kriteria)
                                            <td>{{ isset($idealPositive[$kriteria->id]) ? $idealPositive[$kriteria->id] : '-' }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>Ideal Negatif</td>
                                        @foreach($kriterias as $kriteria)
                                            <td>{{ isset($idealNegative[$kriteria->id]) ? $idealNegative[$kriteria->id] : '-' }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                    <!-- HASIL -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="mx-auto text-center">
                                <h2>HASIL</h2>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="hasil" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>D +</th>
                                        <th>D -</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $alternatif->nama }}</td>
                                            <td>{{ isset($distancesToPositive[$alternatif->id]) ? $distancesToPositive[$alternatif->id] : '-' }}</td>
                                            <td>{{ isset($distancesToNegative[$alternatif->id]) ? $distancesToNegative[$alternatif->id] : '-' }}</td>
                                            <td>{{ isset($preferences[$alternatif->id]) ? $preferences[$alternatif->id] : '-' }}</td>
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

@section('scripts')
    <script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#normalisasi').DataTable();
            $('#terbobot').DataTable();
            $('#ideal').DataTable();
            $('#hasil').DataTable();
        } );
    </script>
@endsection