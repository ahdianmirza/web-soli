@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Nama Lab</th>
                                        <th style="text-align: center;">Nama Dosen</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">tanggal peminjaman</th>
                                        <th style="text-align: center;">waktu</th>
                                        <th style="text-align: center;">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $item->nomor }}</td>
                                            <!-- Menggunakan nomor urut -->
                                            <td style="text-align: center;">{{ $item->lab }}</td>
                                            <td style="text-align: center;">{{ $item->dosen }}</td>
                                            <td style="text-align: center;">{{ $item->nama_alat }}</td>
                                            <td style="text-align: center;">{{ $item->spesifikasi }}</td>
                                            <td style="text-align: center;">{{ $item->jumlah_pinjam }}</td>
                                            <td style="text-align: center;">{{ $item->kondisi }}</td>
                                            <td style="text-align: center;">{{ $item->tanggal_pinjam }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->waktu == 1)
                                                    <a>08.00 - 09.00</a>
                                                @elseif ($item->waktu == 2)
                                                    <a>09.00 - 10.00</a>
                                                @elseif ($item->waktu == 3)
                                                    <a>10.00 - 11.00</a>
                                                @elseif ($item->waktu == 4)
                                                    <a>11.00 - 12.00</a>
                                                @elseif ($item->waktu == 5)
                                                    <a>13.00 - 14.00</a>
                                                @elseif ($item->waktu == 6)
                                                    <a>14.00 - 15.00</a>
                                                @elseif ($item->waktu == 7)
                                                    <a>15.00 - 16.00</a>
                                                @elseif ($item->waktu == 8)
                                                    <a>16.00 - 17.00</a>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($item->approve == 1)
                                                    <span class="badge bg-warning">Menunggu Approvel</span>
                                                @elseif ($item->approve == 2)
                                                    <span class="badge bg-primary">approve</span>
                                                @elseif ($item->approve == 3)
                                                    <span class="badge bg-info">pengecekan</span>
                                                @elseif ($item->approve == 2)
                                                    <span class="badge bg-sukses">selesai</span>
                                                @endif
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
@endsection
