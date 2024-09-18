@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Peminjaman Approval</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Peminjaman Approval</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

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
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <a type="button" style="margin-left: 10px; margin-bottom:10px;"
                                class="btn  btn-outline-info btn-sm" onclick="downloadPDFAll()">Download PDF</a>
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
                                @foreach ($peminjamanList as $item)
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
                                            @if ($item->status == 1 && $item->is_rejected === null)
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #fd7e14">Menunggu</button>
                                            @endif
                                            @if ($item->status == 1 && $item->is_rejected == 1)
                                                <button class="btn btn-danger btn-sm">Ditolak</button>
                                            @endif

                                            @if ($item->status == 2)
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #6f42c1">Setuju</button>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="/detail-peminjaman-approval/{{ $item->approval_id }}"
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
        </section>
    </main>

    <script>
        function downloadPDFAll() {
            window.location.href = `/peminjaman/pdfall`;
        }
    </script>
@endsection
