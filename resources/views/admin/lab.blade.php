@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Lab</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Lab</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-3">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <a href="/lab/add" style="margin-left: 10px; margin-bottom:10px;"
                                    class="btn btn-primary btn-sm">Tambah Lab</a>
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Lab</th>
                                        <th style="text-align: center;">Nama Departemen</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labData as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $item->nomor }}</td>
                                            <!-- Menggunakan nomor urut -->
                                            <td>{{ $item->lab }}</td>
                                            <td>{{ $item->departemen }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>

                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="/lab/{{ $item->id_lab }}/edit"
                                                    class="btn btn-outline-warning btn-sm">Edit</a>
                                                <form action="/lab/{{ $item->id_lab }}/delete" method="POST"
                                                    id="deleteLabForm-{{ $item->id_lab }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button onclick="handleDelete(event, {{ $item->id_lab }})"
                                                        type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
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
        @include('admin.lab.lab_js')
    </main>
@endsection
