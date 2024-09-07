@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Header Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Header Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <a href="/header-peminjamanUser/add" class="btn btn-primary btn-sm mb-3">Tambah Header
                                Peminjaman</a>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Peminjam</th>
                                        <th style="text-align: center;">Nama Header</th>
                                        <th style="text-align: center;">Nama Laboratorium</th>
                                        <th style="text-align: center;">Nama Dosen</th>
                                        <th style="text-align: center;">Tanggal Peminjaman</th>
                                        <th style="text-align: center;">Waktu Mulai</th>
                                        <th style="text-align: center;">Waktu Selesai</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($headerPeminjaman as $header)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $header->user_name }}</td>
                                            <td style="text-align: center;">{{ $header->header_name }}</td>
                                            <td style="text-align: center;">{{ $header->lab }}</td>
                                            <td style="text-align: center;">{{ $header->dosen }}</td>
                                            <td style="text-align: center;">
                                                {{ date('d M Y', strtotime($header->tanggal_pinjam)) }}</td>
                                            <td style="text-align: center;">
                                                {{ date('H:i', strtotime($header->start_time)) }}</td>
                                            <td style="text-align: center;">
                                                {{ date('H:i', strtotime($header->end_time)) }}</td>
                                            <td class="d-flex gap-2 flex-wrap justify-content-center align-items-center">
                                                <a href="/header-peminjamanUser/{{ $header->id }}/edit"
                                                    class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <form action="/header-peminjamanUser/{{ $header->id }}/delete"
                                                    method="post" id="deleteHeaderForm-{{ $header->id }}">
                                                    @csrf
                                                    @method('put')
                                                    <button onclick="handleDeleteHeader(event, {{ $header->id }})"
                                                        type="submit" class="btn btn-danger btn-sm"><i
                                                            class="bi bi-trash"></i></button>
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
        @include('user.header-peminjaman_js')
    </main>
@endsection
