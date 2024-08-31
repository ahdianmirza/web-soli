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

    <p>Pengawas: {{ $user->name }}</p>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Peminjam</th>
                <th>Nama Lab</th>
                <th>Nama Alat</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Kondisi</th>
                <th>Paraf Pengawas</th>
            </tr>
        </thead>
        @foreach($peminjaman as $index => $pinjam)
        <tbody>
            <tr>
                <td>{{ $index + 1 }}</td>
                @php
                $namaUser = DB::table('users')->where('email', $pinjam->email)->value('name');
                @endphp
                <td>{{$namaUser}}</td>
                <td>{{ $pinjam->lab->lab }}</td>
                <td>{{ $pinjam->alat->nama_alat }}</td>
                <td>{{ $pinjam->jumlah_pinjam }}</td>
                <td>
                    @if ($pinjam->approve == 1)
                    Menunggu
                    @elseif ($pinjam->approve == 2)
                    Setujui
                    @elseif ($pinjam->approve == 3)
                    Pengecekan
                    @elseif ($pinjam->approve == 4)
                    Selesai
                    @elseif ($pinjam->approve == 5)
                    Tolak
                    @endif
                </td>
                <td>{{ $pinjam->kondisi }}</td>
                <td></td> <!-- Paraf pengawas -->
            </tr>
        </tbody>
        @endforeach
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
            <p style="margin-right: 27px;">Kepala Laboratorium</p>
            <br>
            <br>
            <br>
            <br>
            <p>(...............................................)</p>
        </div>
    </div>
</body>

</html>