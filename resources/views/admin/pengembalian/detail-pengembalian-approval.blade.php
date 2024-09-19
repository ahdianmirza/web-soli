@extends('layout.admin')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Detail Pengembalian</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Detail Pengembalian</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <secton class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <h4>Informasi Detail Pengembalian</h4>
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

                            {{-- Pengembalian Ditolak --}}
                            @if (
                                $selectedApprovalPengembalian->status_approval == 3 &&
                                    $selectedApprovalPengembalian->result == 'rejected' &&
                                    $selectedApprovalPengembalian->is_resolved === null)
                                <hr>
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Pengembalian Ditolak</h5>
                                        <p class="card-text">Note Admin : {{ $selectedApprovalPengembalian->note }}</p>
                                    </div>
                                </div>
                            @endif
                            {{-- Pengembalian Ditolak --}}

                            {{-- Pengembalian Resolved --}}
                            @if (
                                $selectedApprovalPengembalian->status_approval == 3 &&
                                    $selectedApprovalPengembalian->result == 'rejected' &&
                                    $selectedApprovalPengembalian->is_resolved === 1)
                                <hr>
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Pengembalian Diperbaiki</h5>
                                        <p class="card-text">Note Admin : {{ $selectedApprovalPengembalian->note }}</p>
                                        <p class="card-text">Note Perbaikan :
                                            {{ $selectedApprovalPengembalian->note_resolved }}</p>
                                    </div>
                                </div>

                                <h4>Persetujuan Pengembalian</h4>
                                <form action="/pengembalian-approval/admin/{{ $selectedApprovalPengembalian->id }}"
                                    method="post" class="mt-1"
                                    id="pengembalianAdminForm-{{ $selectedApprovalPengembalian->id }}">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="note">Note</label>
                                        <textarea id="note" name="note" class="form-control mt-1" required></textarea>
                                    </div>

                                    <input type="hidden" name="status" value="3">
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

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/pengembalian-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button
                                            onclick="handlePengembalianAdmin(event, {{ $selectedApprovalPengembalian->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Pengembalian Resolved --}}

                            {{-- Persetujuan Pengembalian --}}
                            @if ($selectedApprovalPengembalian->status_approval == 3 && $selectedApprovalPengembalian->result == 'waiting')
                                <hr>
                                <h4>Persetujuan Pengembalian</h4>
                                <form action="/pengembalian-approval/admin/{{ $selectedApprovalPengembalian->id }}"
                                    method="post" class="mt-1"
                                    id="pengembalianAdminForm-{{ $selectedApprovalPengembalian->id }}">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="note">Note</label>
                                        <textarea id="note" name="note" class="form-control mt-1" required></textarea>
                                    </div>

                                    <input type="hidden" name="status" value="3">
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

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/pengembalian-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button
                                            onclick="handlePengembalianAdmin(event, {{ $selectedApprovalPengembalian->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Persetujuan Pengembalian --}}
                        </div>
                    </div>
                </div>
            </div>
        </secton>
        @include('admin.pengembalian.detail-pengembalian-approval_js')
    </main>
@endsection
