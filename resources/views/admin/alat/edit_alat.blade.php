@extends('layout.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Edit Alat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/alat/{{ $selectedAlat[0]->id_alat }}" method="POST">
                                @method('PUT')
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="alatName">Nama Alat</label>
                                    <input type="text" class="form-control" id="alatName" name="nama_alat"
                                        value="{{ $selectedAlat[0]->nama_alat }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="spec">Spesifikasi</label>
                                    <input type="text" class="form-control" id="spec" name="spesifikasi"
                                        value="{{ $selectedAlat[0]->spesifikasi }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                        value="{{ $selectedAlat[0]->jumlah }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kondisi">Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" name="kondisi_alat"
                                        value="{{ $selectedAlat[0]->kondisi_alat }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="statusField">Status</label>
                                    <select class="form-control" id="statusField" name="status">
                                        <option value="1" @if ($selectedAlat[0]->id_status === 1) selected @endif>Aktif
                                        </option>
                                        <option value="2" @if ($selectedAlat[0]->id_status === 2) selected @endif>Non-Aktif
                                        </option>
                                    </select>
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
