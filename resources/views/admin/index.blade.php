@extends('layout.admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-3">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Formulir Peminjaman:</h5>
                                    <p class="card-text text-center"
                                        style="font-size: 36px; font-style: bold; margin-top: 10px;">
                                        {{ $jumlahForm }}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End Card 1 -->
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Alat yang Belum Dikembalikan:</h5>
                                    <p class="card-text text-center"
                                        style="font-size: 36px; font-style: bold; margin-top: 10px;">
                                        {{ $jumlahAlatDipinjam }}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End Card 2 -->
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div
                                    class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title">Approval</h5>
                                    <canvas id="myPieChart"
                                        style="place-items: center; max-width: 300px; max-height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Alat yang Belum Dikembalikan</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; font-size: 16px;">No</th>
                                        <th style="text-align: center; font-size: 16px;">Nama Form</th>
                                        <th style="text-align: center; font-size: 16px;">Nama Lab</th>
                                        <th style="text-align: center; font-size: 16px;">Tanggal Pinjam</th>
                                        <th style="text-align: center; font-size: 16px;">Alat</th>
                                        <th style="text-align: center; font-size: 16px;">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($belumKembali as $item)
                                        <tr>
                                            <td style="text-align: center; font-size: 16px;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center; font-size: 16px;">{{ $item->header_name }}</td>
                                            <td style="text-align: center; font-size: 16px;">{{ $item->lab }}</td>
                                            <td style="text-align: center; font-size: 16px;">
                                                {{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}
                                            </td>
                                            <td style="text-align: center; font-size: 16px;">{{ $item->nama_alat }}</td>
                                            <td style="text-align: center; font-size: 16px;">{{ $item->qty_borrow }}</td>
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
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var dataTolak = {{ $peminjamanTolak }};
        var dataSetujui = {{ $peminjamanSetuju }};
        var dataMenunggu = {{ $peminjamanMenunggu }};
        var dataPengecekan = {{ $peminjamanPengecekan }};
        var dataSelesai = {{ $peminjamanSelesai }};
        // Pie chart setup
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tolak', 'Setujui', 'Menunggu', 'Pengecekan', 'Selesai'],
                datasets: [{
                    label: 'Pie Chart Example',
                    data: [dataTolak, dataSetujui, dataMenunggu, dataPengecekan, dataSelesai],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
