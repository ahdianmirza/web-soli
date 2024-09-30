@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dosen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Dosen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="/dosen/add" style="margin: 20px 0 10px 0;" class="btn btn-primary btn-sm">Tambah
                                <i class="bi bi-plus-lg"></i></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Dosen</th>
                                        <th style="text-align: center;">Departemen</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dosenList as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $item->nama_dosen }}</td>
                                            <td style="text-align: center;">{{ $item->departemen }}</td>
                                            <td style="text-align: center;" class="d-flex gap-2 justify-content-center">
                                                <a href="/dosen/edit/{{ $item->id_dosen }}" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit" class="btn btn-warning btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                <form action="/dosen/delete/{{ $item->id_dosen }}" method="post"
                                                    id="deleteDosenForm-{{ $item->id_dosen }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button onclick="handleDeleteDosen(event, {{ $item->id_dosen }})"
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
        @include('admin.dosen.dosen_js')
    </main>

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
