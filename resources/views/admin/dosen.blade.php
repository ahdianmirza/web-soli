@extends('layout.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dosen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Dosen</li>
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
                            <a type="button" style="margin-left: 10px; margin-bottom:10px;" class="btn  btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#">Tambah Dosen</a>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Dosen</th>
                                    <th style="text-align: center;">Departemen</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosen as $item)
                                <tr>
                                    <td style="text-align: center;">{{$item->id_dosen}}</td>
                                    <td style="text-align: center;">{{$item->nama_dosen}}</td>
                                    <td style="text-align: center;">{{$item->departemen}}</td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editReservasiModal">Edit</button>
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
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