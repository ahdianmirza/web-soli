@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Alat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <a href="/alat/add" style="margin-left: 10px; margin-bottom:10px;"
                                class="btn btn-primary btn-sm">Tambah <i class="bi bi-plus-lg"></i></a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Lab</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alatData as $index => $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $index + 1 }}</td>
                                            <td>{{ $item->lab }}</td>
                                            <td>{{ $item->nama_alat }}</td>
                                            <td>{{ $item->spesifikasi }}</td>
                                            <td style="text-align: center;">{{ $item->jumlah }}</td>
                                            <td style="text-align: center;">{{ $item->kondisi_alat }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;"
                                                class="d-flex align-items-start justify-content-center gap-2">
                                                <a data-bs-toggle="tooltip" data-bs-title="Edit"
                                                    href="/alat/{{ $item->id_alat }}/edit" class="btn btn-warning btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                <form action="/alat/{{ $item->id_alat }}/delete" method="post"
                                                    id="deleteAlatForm-{{ $item->id_alat }}">
                                                    @method('put')
                                                    @csrf
                                                    <button data-bs-toggle="tooltip" data-bs-title="Hapus"
                                                        onclick="handleDeleteAlat(event, {{ $item->id_alat }})"
                                                        class="btn btn-danger btn-sm" type="submit">
                                                        <i class="bi bi-trash-fill"></i>
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
        </section>

        @include('admin.alat.alat_js')
    </main>

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
