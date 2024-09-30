@extends('layout.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Dosen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Tambah Dosen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/dosen/store" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="nama_dosen">Nama Dosen</label>
                                    <input type="text" class="form-control mt-1" id="nama_dosen" name="nama_dosen"
                                        placeholder="Masukkan nama dosen" required>
                                </div>

                                <div class="float-end">
                                    <a href="/dosen" class="btn btn-danger edit-close">Batal</a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
