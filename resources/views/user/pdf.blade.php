<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Alat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        p {
            margin: 0;
            padding: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        .signature-container {
            display: flex;
            justify-content: flex-end;
            /* Mengatur tanda tangan agar berada di sebelah kanan */
            align-items: center;
            width: 100%;
            margin-top: 50px;
        }

        .signature {
            width: 90%;
            text-align: right;
            /* Mengatur teks agar rata kanan */
        }
    </style>
</head>

<body>
    <h2>Laporan Peminjaman Alat</h2>
    <h2>Laboratorium THP</h2>

    <p>Nama Peminjam: {{ $user->name }}</p>
    <p>Waktu Peminjaman:
        @if ($peminjaman->waktu == 1)
        <a>08.00 - 09.00</a>
        @elseif ($peminjaman->waktu == 2)
        <a>09.00 - 10.00</a>
        @elseif ($peminjaman->waktu == 3)
        <a>10.00 - 11.00</a>
        @elseif ($peminjaman->waktu == 4)
        <a>11.00 - 12.00</a>
        @elseif ($peminjaman->waktu == 5)
        <a>13.00 - 14.00</a>
        @elseif ($peminjaman->waktu == 6)
        <a>14.00 - 15.00</a>
        @elseif ($peminjaman->waktu == 7)
        <a>15.00 - 16.00</a>
        @elseif ($peminjaman->waktu == 8)
        <a>16.00 - 17.00</a>
        @endif
    </p>
    <p>Tanggal Peminjaman: {{ $peminjaman->tanggal_pinjam }}</p>
    <p>Status:
        @if ($peminjaman->approve == 1)
        Menunggu Approvel
        @elseif ($peminjaman->approve == 2)
        Approve
        @elseif ($peminjaman->approve == 3)
        Pengecekan
        @else
        Selesai
        @endif
    </p>

    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Lab</th>
                <th>Nama Alat</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $peminjaman->lab->lab }}</td>
                <td>{{ $peminjaman->alat->nama_alat }}</td>
                <td>{{ $peminjaman->jumlah_pinjam }}</td>
                <td>{{ $peminjaman->kondisi }}</td>
                <td></td> <!-- Paraf pengawas -->
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="signature-container">
        <div class="signature">
            <p style="margin-right: 25px;">Bogor, ...........................</p>
            <br>
            <br>
            <br>
            <br>
            <p style="margin-right: 27px;">Pengawas Laboratorium</p>
            <p>(...............................................)</p>
        </div>
    </div>
</body>

</html>