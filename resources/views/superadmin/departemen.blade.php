@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Departemen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="/departemenSA/add" style="margin: 20px 0 10px 0;" class="btn btn-primary btn-sm">Tambah
                                <i class="bi bi-plus-lg"></i></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Nama Departemen</th>
                                        <th style="text-align: center;">Nama Fakultas</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departemenList as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $item->departemen }}</td>
                                            <td style="text-align: center;">{{ $item->fakultas }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @endif

                                                @if ($item->status == 0)
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;" class="d-flex gap-2 justify-content-center">
                                                <a href="/departemenSA/edit/{{ $item->id_departemen }}"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit"
                                                    class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>

                                                <form action="/departemenSA/delete/{{ $item->id_departemen }}"
                                                    method="post" id="deleteDepartemenForm-{{ $item->id_departemen }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button
                                                        onclick="handleDeleteDepartemen(event, {{ $item->id_departemen }})"
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
        @include('superadmin.departemen.departemen_js')
    </main>

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
