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

                                                @if ($header->status == 1 && $header->is_rejected === null)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #fd7e14">Menunggu</button>
                                                @endif
                                                @if ($header->status == 1 && $header->is_rejected == 1)
                                                    <button class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif

                                                @if ($header->status == 2)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #6f42c1">Setuju</button>
                                                @endif

                                                @if ($header->status == 3 && $header->is_rejected == null)
                                                    <button class="btn btn-default btn-sm text-white"
                                                        style="background-color: #20c997">Pengecekan</button>
                                                @endif
                                                @if ($header->status == 3 && $header->is_rejected == 1)
                                                    <button class="btn btn-danger btn-sm">Ditolak</button>
                                                @endif

                                                @if ($header->status == 4)
                                                    <button class="btn btn-primary btn-sm">Selesai</button>
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

                                                            <input type="hidden" name="result" value="waiting">
                                                            <input type="hidden" name="status" value="1">
                                                            <button
                                                                onclick="handleApprovalHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-default btn-sm"
                                                                style="background-color: #6610f2"><i
                                                                    class="bi bi-send-fill text-white"></i></button>
                                                        </form>
                                                    @endif

                                                    {{-- Show History --}}
                                                    @if ($header->status !== null)
                                                        <button class="btn btn-default btn-sm text-white"
                                                            data-bs-toggle="modal"
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
                                                            <button
                                                                onclick="handlePengembalianHeader(event, {{ $header->id }})"
                                                                type="submit" class="btn btn-default btn-sm text-white"
                                                                style="background-color: #20c997"><i
                                                                    class="bi bi-check-lg"></i></button>
                                                        </form>
                                                    @endif

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="historyModal-{{ $header->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5">History Persetujuan</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                    $selectedHistory = $approvalHistory->where('id_header', $header->id);
                                                                    ?>

                                                                    @foreach ($selectedHistory as $history)
                                                                        @if ($history->status_approval == 1)
                                                                            <h2 class="modal-title fs-5">
                                                                                Persetujuan Peminjaman
                                                                            </h2>
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
                                                                                    @foreach ($selectedHistory as $approval)
                                                                                        <tr>
                                                                                            <td>{{ $approval->user_name }}
                                                                                            </td>

                                                                                            <td>
                                                                                                @if ($approval->status_approval === 1 && $approval->result === 'waiting')
                                                                                                    <button
                                                                                                        class="btn btn-default btn-sm text-white"
                                                                                                        style="background-color: #fd7e14">Menunggu</button>
                                                                                                @endif
                                                                                                @if ($approval->status_approval === 1 && $approval->result === 'rejected')
                                                                                                    <button
                                                                                                        class="btn btn-danger btn-sm">Ditolak</button>
                                                                                                @endif

                                                                                                @if ($approval->status_approval === 1 && $approval->result === 'approve')
                                                                                                    <button
                                                                                                        class="btn btn-default btn-sm text-white"
                                                                                                        style="background-color: #6f42c1">Setuju</button>
                                                                                                @endif
                                                                                            </td>

                                                                                            <td>{{ $approval->note }}</td>
                                                                                            <td>{{ date('d M Y - H:i', strtotime($approval->updated_at)) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        @endif
                                                                    @endforeach

                                                                    <?php
                                                                    $selectedPengembalianHistory = $pengembalianHistory->where('id_header', $header->id);
                                                                    ?>
                                                                    @foreach ($selectedPengembalianHistory as $history)
                                                                        @if ($history->status_approval == 3)
                                                                            <div class="pt-3">
                                                                                <h2 class="modal-title fs-5">
                                                                                    Persetujuan Pengembalian
                                                                                </h2>
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
                                                                                        @foreach ($selectedPengembalianHistory as $approval)
                                                                                            <tr>
                                                                                                <td>{{ $approval->user_name }}
                                                                                                </td>

                                                                                                <td>
                                                                                                    @if ($approval->status_approval === 3 && $approval->result === 'waiting')
                                                                                                        <button
                                                                                                            class="btn btn-default btn-sm text-white"
                                                                                                            style="background-color: #20c997">Pengecekan</button>
                                                                                                    @endif
                                                                                                    @if ($approval->status_approval === 3 && $approval->result === 'rejected')
                                                                                                        <button
                                                                                                            class="btn btn-danger btn-sm">Ditolak</button>
                                                                                                    @endif

                                                                                                    @if ($approval->status_approval === 3 && $approval->result === 'approve')
                                                                                                        <button
                                                                                                            class="btn btn-primary btn-sm">Selesai</button>
                                                                                                    @endif
                                                                                                </td>

                                                                                                <td>{{ $approval->note }}
                                                                                                </td>
                                                                                                <td>{{ date('d M Y - H:i', strtotime($approval->updated_at)) }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
@endsection
