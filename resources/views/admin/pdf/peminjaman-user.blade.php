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
    <h2 style="font-size: 20px;">Rekap Data Peminjaman User</h2>

    <div style="margin: 0 0 18px 0">
        <p style="
      font-size: 14px;
      margin: 0
      ">Nama Peminjam : {{ $user->name }}</p>
        <p style="
      font-size: 14px;
      margin: 4px 0 0 0
      ">Nama Formulir :
            {{ $selectedHeader->header_name }}</p>
        <p style="
      font-size: 14px;
      margin: 4px 0 0 0
      ">Nama Lab : {{ $selectedHeader->lab }}</p>
        <p style="
      font-size: 14px;
      margin: 4px 0 0 0
      ">Nama Dosen Pembimbing :
            {{ $selectedHeader->dosen }}
        </p>
        <p style="
      font-size: 14px;
      margin: 4px 0 0 0
      ">Tanggal Pinjam :
            {{ date('d M Y', strtotime($selectedHeader->tanggal_pinjam)) }}
        </p>
        <p style="
      font-size: 14px;
      margin: 4px 0 0 0
      ">Waktu Pinjam :
            {{ date('H:i', strtotime($selectedHeader->start_time)) }} -
            {{ date('H:i', strtotime($selectedHeader->end_time)) }}
        </p>
        @if ($selectedHeader->status == 2)
            <p style="font-size: 14px; margin: 4px 0 0 0;">Status Persetujuan : <span
                    style="background-color: #6f42c1; color: white; font-weight: bold">Setuju</span></p>
        @endif
        @if ($selectedHeader->status == 3 && $selectedHeader->is_rejected === null && $selectedHeader->is_resolved === null)
            <p style="font-size: 14px; margin: 4px 0 0 0;">Status Persetujuan : <span
                    style="background-color: #20c997; color: white; font-weight: bold">Pengecekan</span></p>
        @endif
        @if ($selectedHeader->status == 3 && $selectedHeader->is_rejected == 1)
            <p style="font-size: 14px; margin: 4px 0 0 0;">Status Persetujuan : <span
                    style="background-color: #dc3545; color: white; font-weight: bold">Ditolak</span></p>
        @endif
        @if ($selectedHeader->status == 3 && $selectedHeader->is_resolved == 1)
            <p style="font-size: 14px; margin: 4px 0 0 0;">Status Persetujuan : <span
                    style="background-color: #20c997; color: white; font-weight: bold">Diperbaiki</span></p>
        @endif
        @if ($selectedHeader->status == 4)
            <p style="font-size: 14px; margin: 4px 0 0 0;">Status Persetujuan : <span
                    style="background-color: #0d6efd; color: white; font-weight: bold">Selesai</span></p>
        @endif
    </div>

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th style="text-align: center; font-size: 14px;">No</th>
                <th style="text-align: center; font-size: 14px;">Nama Alat</th>
                <th style="text-align: center; font-size: 14px;">Jumlah Peminjaman</th>
                <th style="text-align: center; font-size: 14px;">Kondisi</th>
                <th style="text-align: center; font-size: 14px;">Spesifikasi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($selectedDetail as $item)
                <tr>
                    <td style="text-align: center; font-size: 12px;">
                        {{ $loop->iteration }}</td>
                    <td style="text-align: center; font-size: 12px;">
                        {{ $item->nama_alat }}</td>
                    <td style="text-align: center; font-size: 12px;">
                        {{ $item->qty_borrow }}</td>
                    <td style="text-align: center; font-size: 12px;">
                        {{ $item->kondisi_alat }}</td>
                    <td style="text-align: center; font-size: 12px;">
                        {{ $item->spesifikasi }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>

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
