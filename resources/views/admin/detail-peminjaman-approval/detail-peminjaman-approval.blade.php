@extends('layout.admin')
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
                    <div class="card">
                        <div class="card-body mt-3">
                            <h4>Informasi Detail Peminjaman</h4>
                            <span class="d-flex flex-column gap-1 mb-3">
                                <p class="my-0">Nama Header : {{ $selectedHeader->header_name }}</p>
                                <p class="my-0">Nama Laboratorium : {{ $selectedHeader->lab_name }}</p>
                                <p class="my-0">Nama Peminjam : {{ $selectedHeader->user_name }}</p>
                                <p class="my-0">Nama Dosen : {{ $selectedHeader->dosen }}</p>
                                <p class="my-0">Tanggal Peminjaman :
                                    {{ date('d M Y', strtotime($selectedHeader->tanggal_pinjam)) }}</p>
                                <p class="my-0">Waktu : {{ date('H:i', strtotime($selectedHeader->start_time)) }} -
                                    {{ date('H:i', strtotime($selectedHeader->end_time)) }}</p>
                            </span>
                            <hr>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Jumlah Peminjaman</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailList as $detail)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $detail->nama_alat }}</td>
                                            <td style="text-align: center;">{{ $detail->jumlah }}</td>
                                            <td style="text-align: center;">{{ $detail->kondisi_alat }}</td>
                                            <td style="text-align: center;">{{ $detail->spesifikasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Persetujuan Peminjaman --}}
                            @if ($selectedApprovalPeminjaman->status_approval == 1 && $selectedApprovalPeminjaman->result == 'waiting')
                                <hr>
                                <h4>Persetujuan Peminjaman</h4>
                                <form action="/peminjaman-approval/admin/{{ $selectedApprovalPeminjaman->id }}"
                                    method="post" class="mt-1"
                                    id="approvalAdminForm-{{ $selectedApprovalPeminjaman->id }}">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="note">Note</label>
                                        <textarea id="note" name="note" class="form-control mt-1" required></textarea>
                                    </div>

                                    <input type="hidden" name="status" value="2">
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result" value="approve"
                                                id="approve">
                                            <label class="form-check-label" for="approve">
                                                Setuju
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result" value="rejected"
                                                id="rejected">
                                            <label class="form-check-label" for="rejected">
                                                Tolak
                                            </label>
                                        </div>
                                    </div>

                                    <button onclick="handleApprovalAdmin(event, {{ $selectedApprovalPeminjaman->id }})"
                                        type="submit" class="btn btn-primary btn-sm mt-2">Kirim</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.detail-peminjaman-approval.detail-peminjaman-approval_js')
    </main>
@endsection