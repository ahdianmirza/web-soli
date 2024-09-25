@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Alat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="/alatSA/add" style="margin: 20px 0 10px 0;" class="btn btn-primary btn-sm">Tambah
                                <i class="bi bi-plus-lg"></i></a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">Lab</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alatData as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $item->nama_alat }}</td>
                                            <td style="text-align: center;">{{ $item->spesifikasi }}</td>
                                            <td style="text-align: center;">{{ $item->jumlah }}</td>
                                            <td style="text-align: center;">{{ $item->kondisi_alat }}</td>
                                            <td style="text-align: center;">{{ $item->lab }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;" class="d-flex gap-2 justify-content-center">
                                                <a href="/alatSA/edit/{{ $item->id_alat }}" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit" class="btn btn-warning btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                <form action="/alatSA/delete/{{ $item->id_alat }}" method="post"
                                                    id="deleteAlatForm-{{ $item->id_alat }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button onclick="handleDeleteAlat(event, {{ $item->id_alat }})"
                                                        type="submit" class="btn btn-danger btn-sm"><i
                                                            data-bs-toggle="tooltip" data-bs-title="Hapus"
                                                            class="bi bi-trash-fill"></i></i></button>
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
        </section>
        @include('superadmin.alat.alat_js')
    </main>

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
