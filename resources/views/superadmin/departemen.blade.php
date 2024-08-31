@extends('layout.superadmin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Departemen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Departemen</li>
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
                                    <th style="text-align: center;">Nama Departemen</th>
                                    <th style="text-align: center;">Nama Fakultas</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $departemen as $item )
                                <tr>
                                    <td style="text-align: center;">{{$item->nomor}}</td> <!-- Menggunakan nomor urut -->
                                    <td style="text-align: center;">{{$item->departemen}}</td>
                                    <td style="text-align: center;">{{$item->fakultas}}</td>
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