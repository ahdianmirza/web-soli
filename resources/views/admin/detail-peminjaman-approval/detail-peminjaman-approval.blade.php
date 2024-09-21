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
                                <p class="my-0">Nama Dosen Pembimbing : {{ $selectedHeader->dosen }}</p>
                                <p class="my-0">Tanggal Peminjaman :
                                    {{ date('d M Y', strtotime($selectedHeader->tanggal_pinjam)) }}</p>
                                <p class="my-0">Waktu Dibuat :
                                    {{ date('d M Y - H:i', strtotime($selectedHeader->created_at)) }}</p>
                                <p class="my-0">Waktu Peminjaman :
                                    {{ date('H:i', strtotime($selectedHeader->start_time)) }} -
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

                            {{-- Peminjaman Ditolak --}}
                            @if (
                                $selectedApprovalPeminjaman->status_approval == 1 &&
                                    $selectedApprovalPeminjaman->result == 'rejected' &&
                                    $selectedApprovalPeminjaman->is_resolved === null)
                                <hr>
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Peminjaman Ditolak</h5>
                                        <p class="card-text">Note Admin : {{ $selectedLog->note }}</p>
                                    </div>
                                </div>
                            @endif
                            {{-- Peminjaman Ditolak --}}

                            {{-- Peminjaman Resolved --}}
                            @if (
                                $selectedApprovalPeminjaman->status_approval == 1 &&
                                    $selectedApprovalPeminjaman->result == 'rejected' &&
                                    $selectedApprovalPeminjaman->is_resolved == 1)
                                <hr>
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Peminjaman Diperbaiki</h5>
                                        <p class="card-text">Note Admin : {{ $selectedLog->note }}</p>
                                        <p class="card-text">Note Perbaikan :
                                            {{ $selectedLog->note_resolved }}</p>
                                    </div>
                                </div>

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

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/peminjaman-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button onclick="handleApprovalAdmin(event, {{ $selectedApprovalPeminjaman->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Peminjaman Resolved --}}

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

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/peminjaman-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button
                                            onclick="handleApprovalAdmin(event, {{ $selectedApprovalPeminjaman->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Persetujuan Peminjaman --}}


                            {{-- Peminjaman Ditolak --}}
                            @if (
                                $selectedApprovalPeminjaman->status_approval == 3 &&
                                    $selectedApprovalPeminjaman->result == 'rejected' &&
                                    $selectedApprovalPeminjaman->is_resolved === null)
                                <hr>
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Pengembalian Ditolak</h5>
                                        <p class="card-text">Note Admin : {{ $selectedLog->note }}</p>
                                    </div>
                                </div>
                            @endif
                            {{-- Peminjaman Ditolak --}}

                            {{-- Peminjaman Resolved --}}
                            @if (
                                $selectedApprovalPeminjaman->status_approval == 3 &&
                                    $selectedApprovalPeminjaman->result == 'rejected' &&
                                    $selectedApprovalPeminjaman->is_resolved == 1)
                                <hr>
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Pengembalian Diperbaiki</h5>
                                        <p class="card-text">Note Admin : {{ $selectedLog->note }}</p>
                                        <p class="card-text">Note Perbaikan :
                                            {{ $selectedLog->note_resolved }}</p>
                                    </div>
                                </div>

                                <h4>Persetujuan Pengembalian</h4>
                                <form action="/pengembalian-approval/admin/{{ $selectedApprovalPeminjaman->id }}"
                                    method="post" class="mt-1"
                                    id="pengembalianAdminForm-{{ $selectedApprovalPeminjaman->id }}">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="note">Note</label>
                                        <textarea id="note" name="note" class="form-control mt-1" required></textarea>
                                    </div>

                                    <input type="hidden" name="status" value="4">
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result"
                                                value="approve" id="approve">
                                            <label class="form-check-label" for="approve">
                                                Setuju
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result"
                                                value="rejected" id="rejected">
                                            <label class="form-check-label" for="rejected">
                                                Tolak
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/peminjaman-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button
                                            onclick="handlePengembalianAdmin(event, {{ $selectedApprovalPeminjaman->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Peminjaman Resolved --}}

                            {{-- Persetujuan Pengembalian --}}
                            @if ($selectedApprovalPeminjaman->status_approval == 3 && $selectedApprovalPeminjaman->result == 'waiting')
                                <hr>
                                <h4>Persetujuan Pengembalian</h4>
                                <form action="/pengembalian-approval/admin/{{ $selectedApprovalPeminjaman->id }}"
                                    method="post" class="mt-1"
                                    id="pengembalianAdminForm-{{ $selectedApprovalPeminjaman->id }}">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="note">Note</label>
                                        <textarea id="note" name="note" class="form-control mt-1" required></textarea>
                                    </div>

                                    <input type="hidden" name="status" value="4">
                                    <div class="d-flex gap-3 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result"
                                                value="approve" id="approve">
                                            <label class="form-check-label" for="approve">
                                                Setuju
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="result"
                                                value="rejected" id="rejected">
                                            <label class="form-check-label" for="rejected">
                                                Tolak
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="/peminjaman-approval" class="btn btn-danger btn-sm">Kembali</a>
                                        <button
                                            onclick="handlePengembalianAdmin(event, {{ $selectedApprovalPeminjaman->id }})"
                                            type="submit" class="btn btn-primary btn-sm">Kirim</button>
                                    </div>
                                </form>
                            @endif
                            {{-- Persetujuan Pengembalian --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.detail-peminjaman-approval.detail-peminjaman-approval_js')
    </main>
@endsection
