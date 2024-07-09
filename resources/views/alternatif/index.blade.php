@extends('layout.app')
@section('title', 'Mahasiswa')
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
                    <div class="card mt-4">
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
                        <div class="card-body table-responsive">
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
        $(document).ready(function () {
            $('#alternatifTable').DataTable({
                serverSide:true,
                ajax: {
                    url: "{{ route('alternatif.index') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama', name: 'nama' },
                    { data: 'semester', name: 'semester' },
                    { data: 'jurusan', name: 'jurusan' },
                    { data: 'asal_kampus', name: 'asal_kampus' },
                    { data: 'aksi', name: 'aksi', orderable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection
