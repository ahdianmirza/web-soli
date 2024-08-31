@extends('layout.superadmin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Alat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Alat</li>
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
                                    <th style="text-align: center;">Nomor</th>
                                    <th style="text-align: center;">Nama Alat</th>
                                    <th style="text-align: center;">Spesifikasi</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Kondisi</th>
                                    <th style="text-align: center;">Lab</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alatData as $item)
                                <tr>
                                    <td style="text-align: center;">{{$item->nomor}}</td> <!-- Menggunakan nomor urut -->
                                    <td style="text-align: center;">{{$item->nama_alat}}</td>
                                    <td style="text-align: center;">{{$item->spesifikasi}}</td>
                                    <td style="text-align: center;">{{$item->jumlah}}</td>
                                    <td style="text-align: center;">{{$item->kondisi_alat}}</td>
                                    <td style="text-align: center;">{{$item->lab}}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Non-Aktif</span>
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