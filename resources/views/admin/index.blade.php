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
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah peminjam:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold; margin-top: 30px;">
                            {{$jumlahPeminjam}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 1 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah alat yang dipinjam:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold; margin-top: 30px;">
                            {{$jumlahAlatDipinjam}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 2 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah alat yang sudah dikembalikan:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahAlatSudahDikembalikan}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 3 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah alat yang belum dikembalikan:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahAlatBelumDikembalikan}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 3 -->
        </div>

        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Approval</h5>
                        <canvas id="myPieChart" style="place-items: center; max-width: 300px; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Lab</th>
                                    <th style="text-align: center;">Nama Dosen</th>
                                    <th style="text-align: center;">Nama Alat</th>
                                    <th style="text-align: center;">Spesifikasi</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Tanggal Peminjaman</th>
                                    <th style="text-align: center;">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($belumKembali as $item)
                                <tr>
                                    <td style="text-align: center;">{{$item->nomor}}</td> <!-- Menggunakan nomor urut -->
                                    <td >{{$item->lab}}</td>
                                    <td >{{$item->dosen}}</td>
                                    <td >{{$item->nama_alat}}</td>
                                    <td >{{$item->spesifikasi}}</td>
                                    <td style="text-align: center;">{{$item->jumlah_pinjam}}</td>
                                    <td style="text-align: center;">{{$item->tanggal_pinjam}}</td>
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
    var dataTolak = {{ $tolak }};
    var dataSetujui = {{ $setujui }};
    var dataMenunggu = {{ $menunggu }};
    var dataPengecekan = {{ $pengecekan }};
    var dataSelesai = {{ $selesai }};
    // Pie chart setup
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Tolak', 'Setujui', 'Menunggu', 'Pengecekan', 'Selesai'],
            datasets: [{
                label: 'Pie Chart Example',
                data: [ dataTolak, dataSetujui, dataMenunggu, dataPengecekan, dataSelesai
                ], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',  
                    'rgba(54, 162, 235, 0.7)', 
                    'rgba(255, 206, 86, 0.7)', 
                    'rgba(75, 192, 192, 0.7)', 
                    'rgba(153, 102, 255, 0.7)' 
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',  
                    'rgba(54, 162, 235, 1)',   
                    'rgba(255, 206, 86, 1)', 
                    'rgba(75, 192, 192, 1)',  
                    'rgba(153, 102, 255, 1)'   
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
