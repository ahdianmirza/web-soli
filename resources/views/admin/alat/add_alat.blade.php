@extends('layout.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Tambah Alat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/alat" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Laboratorium</label>
                                    <select class="form-control" id="labName" name="id_lab">
                                        <option selected disabled>Pilih lab</option>
                                        @foreach ($labList as $lab)
                                            <option value="{{ $lab->id_lab }}">
                                                {{ $lab->lab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="alatName">Nama Alat</label>
                                    <input type="text" class="form-control" id="alatName" name="nama_alat"
                                        placeholder="Masukkan nama alat">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="spec">Spesifikasi</label>
                                    <input type="text" class="form-control" id="spec" name="spesifikasi"
                                        placeholder="Masukkan spesifikasi">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Masukkan jumlah">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kondisi">Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" name="kondisi_alat"
                                        placeholder="Masukkan kondisi">
                                </div>

                                <div class="float-end">
                                    <a href="/alat" class="btn btn-danger edit-close">Batal</a>
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
