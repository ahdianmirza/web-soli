@extends('layout.admin')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Persetujuan Pengembalian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Persetujuan Pengembalian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Peminjam</th>
                                    <th style="text-align: center;">Nama Header</th>
                                    <th style="text-align: center;">Nama Laboratorium</th>
                                    <th style="text-align: center;">Nama Dosen</th>
                                    <th style="text-align: center;">Tanggal Pinjam</th>
                                    <th style="text-align: center;">Waktu Pinjam</th>
                                    <th style="text-align: center;">Waktu Pembuatan</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengembalianList as $item)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td style="text-align: center;">{{ $item->user_name }}</td>
                                        <td style="text-align: center;">{{ $item->header_name }}</td>
                                        <td style="text-align: center;">{{ $item->lab_name }}</td>
                                        <td style="text-align: center;">{{ $item->dosen }}</td>
                                        <td style="text-align: center;">
                                            {{ date('d M Y', strtotime($item->tanggal_pinjam)) }}</td>
                                        <td style="text-align: center;">
                                            {{ date('H:i', strtotime($item->start_time)) }} -
                                            {{ date('H:i', strtotime($item->end_time)) }}</td>
                                        <td style="text-align: center;">
                                            {{ date('d M Y - H:i', strtotime($item->approval_created_at)) }}</td>
                                        <td style="text-align: center;">
                                            @if ($item->status_approval == 3 && $item->result == 'waiting')
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #20c997">Pengecekan</button>
                                            @endif

                                            @if ($item->status_approval == 3 && $item->result == 'rejected')
                                                <button class="btn btn-danger btn-sm">Ditolak</button>
                                            @endif

                                            @if ($item->status_approval == 3 && $item->result == 'approve')
                                                <button class="btn btn-primary btn-sm">Selesai</button>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="/detail-pengembalian-approval/{{ $item->approval_id }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
