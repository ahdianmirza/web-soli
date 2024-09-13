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
                                        <th style="text-align: center;">Waktu</th>
                                        <th style="text-align: center;">Status</th>
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
                                                {{ date('H:i', strtotime($header->start_time)) }} -
                                                {{ date('H:i', strtotime($header->end_time)) }}</td>
                                            <td style="text-align: center;">
                                                @if ($header->status === null)
                                                    <button class="btn btn-danger btn-sm">Belum Dikirim</button>
                                                @endif

                                                @if ($header->status == 1)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #fd7e14">Menunggu</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                    <a href="/detail-peminjamanUser/{{ $header->id }}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-eye-fill"></i></i></a>

                                                    @if ($header->status === null)
                                                        <a href="/header-peminjamanUser/{{ $header->id }}/edit"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @endif

                                                    @if ($header->status === null)
                                                        <form action="/header-peminjamanUser/{{ $header->id }}/delete"
                                                            method="post" id="deleteHeaderForm-{{ $header->id }}">
                                                            @csrf
                                                            @method('put')
                                                            <button
                                                                onclick="handleDeleteHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="bi bi-trash-fill"></i></i></button>
                                                        </form>
                                                    @endif

                                                    @if ($header->status === null)
                                                        <form action="/peminjaman/{{ $header->id }}" method="post"
                                                            id="approvalHeaderForm-{{ $header->id }}">
                                                            @csrf
                                                            @method('put')
                                                            <button
                                                                onclick="handleApprovalHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-default btn-sm"
                                                                style="background-color: #6610f2"><i
                                                                    class="bi bi-send-fill text-white"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
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
