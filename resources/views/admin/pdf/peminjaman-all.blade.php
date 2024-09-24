<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <style>
        /* Basic table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        /* Table headers */
        th {
            padding: 0.75rem;
            text-align: left;
            border-top: 1px solid #dee2e6;
            border-bottom: 2px solid #dee2e6;
            background-color: #f8f9fa;
            font-weight: bold;
        }

        /* Table cells */
        td {
            padding: 0.75rem;
            border-top: 1px solid #dee2e6;
        }

        /* Optional: Add styles for table borders */
        table.table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Optional: Add a small-sized table */
        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }
    </style>
</head>

<body style="background-color: white">
    <h2 style="font-size: 20px;">Rekap Data Peminjaman</h2>

    <div style="margin: 0 0 18px 0">
        <p style="
      font-size: 14px;
      margin: 0
      ">Nama Admin : {{ $user->name }}</p>
        <p style="
      font-size: 14px;
      margin: 0
      ">Departemen :
            {{ $departmentList->where('id_departemen', $user->id_departemen)->first()->departemen }}</p>

        @if (request('lab') && request('start_date') == null && request('end_date') == null)
            <p style="
      font-size: 14px;
      margin: 0
      ">Filter Lab :
                {{ $labList->where('id_lab', request('lab'))->first()->lab }}</p>
        @endif

        @if (request('lab') == null && request('start_date') && request('end_date'))
            <p style="
      font-size: 14px;
      margin: 0
      ">Filter Tanggal Pinjam :
                {{ date('d M Y', strtotime(request('start_date'))) }} -
                {{ date('d M Y', strtotime(request('end_date'))) }}</p>
        @endif

        @if (request('lab') && request('start_date') && request('end_date'))
            <p style="
      font-size: 14px;
      margin: 0
      ">Filter Lab :
                {{ $labList->where('id_lab', request('lab'))->first()->lab }}</p>
            <p style="
      font-size: 14px;
      margin: 0
      ">Filter Tanggal Pinjam :
                {{ date('d M Y', strtotime(request('start_date'))) }} -
                {{ date('d M Y', strtotime(request('end_date'))) }}</p>
        @endif
    </div>

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center; font-size: 14px;">No</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Nama Peminjam</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Nama Form</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Nama Lab</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Nama Dosen Pembimbing</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Tanggal Pinjam</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Waktu Pinjam</th>
                <th rowspan="2" style="text-align: center; font-size: 14px;">Status</th>
                <th colspan="2" style="text-align: center; font-size: 14px;">Alat</th>
            </tr>
            <tr>
                <th style="text-align: center; font-size: 14px;">Nama</th>
                <th style="text-align: center; font-size: 14px;">Jumlah</th>
            </tr>
        </thead>
        @php
            $jumlahAlatDipinjam = 0;
            $jumlahAlatDikembalikan = 0;
        @endphp
        <tbody>
            @foreach ($peminjamanList as $item)
                @php
                    $detailCount = $detailList->where('id_header', $item->id_header)->count();
                @endphp
                <tr>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ $loop->iteration }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ $item->user_name }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ $item->header_name }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ $item->lab_name }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ $item->dosen }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                    <td rowspan="{{ $detailCount + 1 }}" style="text-align: center; font-size: 12px;">
                        {{ date('H:i', strtotime($item->start_time)) }} -
                        {{ date('H:i', strtotime($item->end_time)) }}</td>

                    @if ($item->status_approval == 1 && $item->result == 'waiting')
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #fd7e14">
                            <p style="color: white; font-weight: bold">Menunggu</p>
                        </td>
                    @endif
                    @if ($item->status_approval == 1 && $item->result == 'rejected' && $item->is_resolved == null)
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #dc3545">
                            <p style="color: white; font-weight: bold">Ditolak</p>
                        </td>
                    @endif
                    @if ($item->status_approval == 1 && $item->result == 'rejected' && $item->is_resolved)
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #fd7e14">
                            <p style="color: white; font-weight: bold">Diperbaiki</p>
                        </td>
                    @endif

                    @if ($item->status_approval == 2 && $item->result == 'approve')
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #6f42c1">
                            <p style="color: white; font-weight: bold">Setuju</p>
                        </td>
                    @endif

                    @if ($item->status_approval == 3 && $item->result == 'waiting')
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #20c997">
                            <p style="color: white; font-weight: bold">Pengecekan</p>
                        </td>
                    @endif
                    @if ($item->status_approval == 3 && $item->result == 'rejected' && $item->is_resolved == null)
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #dc3545">
                            <p style="color: white; font-weight: bold">Ditolak</p>
                        </td>
                    @endif
                    @if ($item->status_approval == 3 && $item->result == 'rejected' && $item->is_resolved)
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #20c997">
                            <p style="color: white; font-weight: bold">Diperbaiki</p>
                        </td>
                    @endif

                    @if ($item->status_approval == 4 && $item->result == 'approve')
                        <td rowspan="{{ $detailCount + 1 }}"
                            style="text-align: center; font-size: 12px; background-color: #0d6efd">
                            <p style="color: white; font-weight: bold">Selesai</p>
                        </td>
                    @endif
                </tr>
                @foreach ($detailList->where('id_header', $item->id_header) as $index => $detail)
                    <tr>
                        <td style="text-align: center; font-size: 12px;">{{ $detail->nama_alat }}</td>
                        <td style="text-align: center; font-size: 12px;">{{ $detail->qty_borrow }}</td>
                    </tr>
                @endforeach

                @php
                    if ($item->status_approval == 2 && $item->result == 'approve') {
                        foreach ($detailList->where('id_header', $item->id_header) as $index => $detail) {
                            $jumlahAlatDipinjam += $detail->qty_borrow;
                        }
                    }

                    if ($item->status_approval == 4 && $item->result == 'approve') {
                        foreach ($detailList->where('id_header', $item->id_header) as $index => $detail) {
                            $jumlahAlatDikembalikan += $detail->qty_borrow;
                        }
                    }
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="8" style="text-align: center; font-size: 14px;">Jumlah Alat Dipinjam</th>
                <td colspan="2" style="text-align: center; font-size: 14px;">{{ $jumlahAlatDipinjam }}</td>
            </tr>
            <tr>
                <th colspan="8" style="text-align: center; font-size: 14px;">Jumlah Alat Dikembalikan</th>
                <td colspan="2" style="text-align: center; font-size: 14px;">{{ $jumlahAlatDikembalikan }}</td>
            </tr>
        </tfoot>
    </table>

    <div style="
		margin: 10px 0 0 0;
		">
        <p style="
				font-size: 14px;
				text-align: right
				">Waktu Cetak :
            {{ date('d M Y - H:i') }}</p>
    </div>
</body>

</html>
