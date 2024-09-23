@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Persetujuan Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Persetujuan Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="lab" class="form-label">Lab</label>
                                        <select id="lab" class="form-select" name="lab">
                                            <option selected value="{{ null }}">Pilih lab</option>

                                            @foreach ($labList as $lab)
                                                <option @if ($lab->id_lab == request('lab')) selected @endif
                                                    value="{{ $lab->id_lab }}">{{ $lab->lab }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Tanggal Awal</label>
                                        <input type="date" class="form-control mt-1" name="start_date" id="start_date"
                                            @if (request('start_date')) value="{{ date('Y-m-d', strtotime(request('start_date'))) }}" @endif>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control mt-1" name="end_date" id="end_date"
                                            @if (request('end_date')) value="{{ date('Y-m-d', strtotime(request('end_date'))) }}" @endif>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <button type="submit" style="width: 100%" class="btn btn-primary">Filter</button>
                                </div>
                                <div class="col">
                                    <a href="/peminjaman-approval" style="width: 100%" class="btn btn-danger">Reset
                                        Filter</a>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <form action="{{ url('peminjaman-download') }}">
                            <input type="hidden" name="lab"
                                @if (request('lab')) value="{{ request('lab') }}" @endif>
                            <input type="hidden" name="start_date"
                                @if (request('start_date')) value="{{ request('start_date') }}" @endif>
                            <input type="hidden" name="end_date"
                                @if (request('end_date')) value="{{ request('end_date') }}" @endif>
                            <button type="submit" style="margin-bottom:10px; background-color: #6610f2"
                                class="btn btn-default text-white fw-semibold">Download PDF <i
                                    class="bi bi-download"></i></button>
                        </form>
                        <!-- Table with stripped rows -->
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
                                            @if ($item->status_approval == 1 && $item->result == 'waiting')
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #fd7e14">Menunggu</button>
                                            @endif
                                            @if ($item->status_approval == 1 && $item->result == 'rejected' && $item->is_resolved == null)
                                                <button class="btn btn-danger btn-sm">Ditolak</button>
                                            @endif
                                            @if ($item->status_approval == 1 && $item->result == 'rejected' && $item->is_resolved)
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #fd7e14">Diperbaiki</button>
                                            @endif

                                            @if ($item->status_approval == 2 && $item->result == 'approve')
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #6f42c1">Setuju</button>
                                            @endif

                                            @if ($item->status_approval == 3 && $item->result == 'waiting')
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #20c997">Pengecekan</button>
                                            @endif
                                            @if ($item->status_approval == 3 && $item->result == 'rejected' && $item->is_resolved == null)
                                                <button class="btn btn-danger btn-sm">Ditolak</button>
                                            @endif
                                            @if ($item->status_approval == 3 && $item->result == 'rejected' && $item->is_resolved)
                                                <button class="btn btn-default btn-sm text-white"
                                                    style="background-color: #20c997">Diperbaiki</button>
                                            @endif

                                            @if ($item->status_approval == 4 && $item->result == 'approve')
                                                <button class="btn btn-primary btn-sm">Selesai</button>
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

    {{-- <script>
        function downloadPDFAll() {
            window.location.href = `/peminjaman/pdfall`;
        }
    </script> --}}
@endsection
