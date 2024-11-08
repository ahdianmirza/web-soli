@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Formulir Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Formulir Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <a href="/header-peminjamanUser/add" class="btn btn-primary btn-sm mb-3">Tambah <i
                                    class="bi bi-plus-lg"></i></a>

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Peminjam</th>
                                        <th style="text-align: center;">Nama Formulir</th>
                                        <th style="text-align: center;">Nama Laboratorium</th>
                                        <th style="text-align: center;">Nama Dosen Pembimbing</th>
                                        <th style="text-align: center;">Tanggal Pinjam</th>
                                        <th style="text-align: center;">Waktu Pinjam</th>
                                        <th style="text-align: center;">Waktu Pembuatan</th>
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
                                                {{ date('d M Y - H:i', strtotime($header->header_created_at)) }}</td>
                                            <td style="text-align: center;">
                                                @if ($header->status === null)
                                                    <button class="btn btn-danger btn-sm">Belum Dikirim</button>
                                                @endif

                                                @if ($header->status == 1 && $header->is_rejected === null && $header->is_resolved === null)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #fd7e14">Menunggu</button>
                                                @endif
                                                @if ($header->status == 1 && $header->is_rejected == 1)
                                                    <button class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif
                                                @if ($header->status == 1 && $header->is_resolved == 1)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #fd7e14">Diperbaiki</button>
                                                @endif

                                                @if ($header->status == 2)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #6f42c1">Setuju</button>
                                                @endif

                                                @if ($header->status == 3 && $header->is_rejected === null && $header->is_resolved === null)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #20c997">Pengecekan</button>
                                                @endif
                                                @if ($header->status == 3 && $header->is_rejected == 1)
                                                    <button class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif
                                                @if ($header->status == 3 && $header->is_resolved == 1)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #20c997">Diperbaiki</button>
                                                @endif
                                                @if ($header->status == 4)
                                                    <button class="btn btn-primary btn-sm">Selesai</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 flex-wrap justify-content-center">
                                                    <a data-bs-toggle="tooltip" data-bs-title="Detail"
                                                        href="/detail-peminjamanUser/{{ $header->id }}"
                                                        class="btn btn-primary btn-sm"><i
                                                            class="bi bi-eye-fill"></i></i></a>

                                                    @if ($header->status === null)
                                                        <a data-bs-toggle="tooltip" data-bs-title="Edit"
                                                            href="/header-peminjamanUser/{{ $header->id }}/edit"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                    @endif

                                                    @if ($header->status === null)
                                                        <form action="/header-peminjamanUser/{{ $header->id }}/delete"
                                                            method="post" id="deleteHeaderForm-{{ $header->id }}">
                                                            @csrf
                                                            @method('put')
                                                            <button data-bs-toggle="tooltip" data-bs-title="Hapus"
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

                                                            <input type="hidden" name="result" value="waiting">
                                                            <input type="hidden" name="status" value="1">
                                                            <button data-bs-toggle="tooltip"
                                                                data-bs-title="Kirim Persetujuan"
                                                                onclick="handleApprovalHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-default btn-sm"
                                                                style="background-color: #6610f2"><i
                                                                    class="bi bi-send-fill text-white"></i></button>
                                                        </form>
                                                    @endif

                                                    {{-- Show History --}}
                                                    @if ($header->status !== null)
                                                        <button class="btn btn-default btn-sm text-white"
                                                            title="History Persetujuan" data-bs-toggle="modal"
                                                            data-bs-target="#historyModal-{{ $header->id }}"
                                                            style="background-color: #d63384"><i
                                                                class="bi bi-clock-history"></i></button>
                                                    @endif

                                                    @if ($header->status == 2)
                                                        <form action="/pengembalian/{{ $header->id }}" method="post"
                                                            id="pengembalianHeaderForm-{{ $header->id }}">
                                                            @csrf
                                                            @method('put')

                                                            <input type="hidden" name="result" value="waiting">
                                                            <input type="hidden" name="status" value="3">
                                                            <button data-bs-toggle="tooltip" data-bs-title="Kembalikan"
                                                                onclick="handlePengembalianHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-default btn-sm text-white"
                                                                style="background-color: #20c997"><i
                                                                    class="bi bi-check-lg"></i></button>
                                                        </form>
                                                    @endif

                                                    @if ($header->status == 2 || $header->status == 3 || $header->status == 4)
                                                        <a href="/peminjaman-user-download/{{ $header->id }}"
                                                            data-bs-toggle="tooltip" data-bs-title="Download Data"
                                                            type="submit" class="btn btn-default btn-sm text-white"
                                                            style="background-color: #6610f2"><i
                                                                class="bi bi-download"></i></a>
                                                    @endif

                                                    <!-- Modal -->
                                                    @if ($peminjamanHistory->isNotEmpty() && $logApproval->isNotEmpty())
                                                        @if ($peminjamanHistory->where('id_header', $header->id)->isNotEmpty())
                                                            <div class="modal fade" id="historyModal-{{ $header->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="historyModalLabel-{{ $header->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="historyModalLabel-{{ $header->id }}">
                                                                                History Persetujuan</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php
                                                                            $selectedPeminjamanHistory = $peminjamanHistory->where('id_header', $header->id)->first();
                                                                            // dd($selectedPeminjamanHistory);
                                                                            $selectedLog = $logApproval->where('id_approval', $selectedPeminjamanHistory->id);
                                                                            ?>

                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">Nama</th>
                                                                                        <th scope="col">Status</th>
                                                                                        <th scope="col">Note</th>
                                                                                        <th scope="col">Waktu</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($selectedLog as $log)
                                                                                        <tr>
                                                                                            <td>{{ $log->user_name }}</td>
                                                                                            <td>
                                                                                                @switch(true)
                                                                                                    @case($log->status_log == 1 && $log->result == 'waiting')
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #fd7e14">Menunggu</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 1 && $log->result == 'rejected' && !$log->note_resolved)
                                                                                                        <button
                                                                                                            class="btn btn-danger btn-sm">Ditolak</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 1 && $log->result == 'rejected' && $log->note_resolved)
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #fd7e14">Diperbaiki</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 2 && $log->result == 'approve')
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #6f42c1">Setuju</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 3 && $log->result == 'waiting')
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #20c997">Pengecekan</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 3 && $log->result == 'rejected' && !$log->note_resolved)
                                                                                                        <button
                                                                                                            class="btn btn-danger btn-sm">Ditolak</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 3 && $log->result == 'rejected' && $log->note_resolved)
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #20c997">Diperbaiki</button>
                                                                                                    @break

                                                                                                    @case($log->status_log == 4 && $log->result == 'approve')
                                                                                                        <button
                                                                                                            class="btn btn-primary btn-sm">Selesai</button>
                                                                                                    @break
                                                                                                @endswitch
                                                                                            </td>
                                                                                            <td>{{ $log->note ?? $log->note_resolved }}
                                                                                            </td>
                                                                                            <td>{{ date('d M Y - H:i', strtotime($log->created_at)) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="modal fade" id="historyModal-{{ $header->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="historyModalLabel-{{ $header->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">History Persetujuan
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Data kosong</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    {{-- Show History --}}
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

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
