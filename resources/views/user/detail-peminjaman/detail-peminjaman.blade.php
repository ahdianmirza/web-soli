@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Detail Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Detail Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if ($rejectedPeminjaman !== null)
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4>Perbaikan Peminjaman</h4>

                                <form action="/perbaikan-peminjaman/{{ $rejectedPeminjaman->id }}" method="post"
                                    id="perbaikanPeminjamanForm-{{ $rejectedPeminjaman->id }}">
                                    @csrf
                                    @method('PUT')

                                    <p class="text-danger">Note Admin : {{ $rejectedPeminjaman->note }}</p>
                                    <div>
                                        <label for="note_resolved">Note Perbaikan</label>
                                        <textarea id="note_resolved" placeholder="Masukkan note perbaikan" name="note_resolved" class="form-control mt-1"
                                            required></textarea>
                                    </div>

                                    <p class="my-1 fst-italic"><span style="color: red;">*</span> Berikan note perbaikan
                                        ketika
                                        sudah
                                        memperbaiki peminjaman</p>

                                    <button onclick="handlePerbaikanPeminjaman(event, {{ $rejectedPeminjaman->id }})"
                                        type="submit" class="btn btn-primary btn-sm mt-2"
                                        style="width: 100%">Kirim</button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body mt-3">
                            <h4>Informasi Detail Peminjaman</h4>
                            <span class="d-flex flex-column gap-1 mb-3">
                                <p class="my-0">Nama Header : {{ $selectedHeader[0]->header_name }}</p>
                                <p class="my-0">Nama Laboratorium : {{ $selectedHeader[0]->lab_name }}</p>
                                <p class="my-0">Nama Peminjam : {{ $selectedHeader[0]->user_name }}</p>
                                <p class="my-0">Nama Dosen : {{ $selectedHeader[0]->dosen }}</p>
                                <p class="my-0">Tanggal Peminjaman :
                                    {{ date('d M Y', strtotime($selectedHeader[0]->tanggal_pinjam)) }}</p>
                                <p class="my-0">Waktu : {{ date('H:i', strtotime($selectedHeader[0]->start_time)) }} -
                                    {{ date('H:i', strtotime($selectedHeader[0]->end_time)) }}</p>
                            </span>
                            <hr>

                            @if ($selectedHeader[0]->status === null)
                                <a href="/detail-peminjamanUser/{{ $selectedHeader[0]->id }}/add"
                                    class="btn btn-primary btn-sm mb-3">Tambah Detail
                                    Peminjaman</a>
                            @endif

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Jumlah Peminjaman</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                        @if ($selectedHeader[0]->status === null || $rejectedPeminjaman !== null)
                                            <th style="text-align: center;">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailList as $detail)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $detail->nama_alat }}</td>
                                            <td style="text-align: center;">{{ $detail->detail_qty_borrow }}</td>
                                            <td style="text-align: center;">{{ $detail->kondisi_alat }}</td>
                                            <td style="text-align: center;">{{ $detail->spesifikasi }}</td>
                                            @if ($selectedHeader[0]->status === null || $rejectedPeminjaman !== null)
                                                <td
                                                    class="d-flex gap-2 flex-wrap justify-content-center align-items-center">
                                                    <a href="/detail-peminjamanUser/{{ $detail->id }}/edit"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="/detail-peminjamanUser/{{ $detail->id }}/delete"
                                                        method="post" id="deleteDetailForm-{{ $detail->id }}">
                                                        @csrf
                                                        @method('put')
                                                        <button onclick="handleDeleteDetail(event, {{ $detail->id }})"
                                                            type="submit" class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash-fill"></i></i></button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('user.detail-peminjaman.detail-peminjaman_js')
    </main>
@endsection
