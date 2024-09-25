@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Tambah Departemen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/departemenSA/store" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="departemen">Nama Departemen</label>
                                    <input type="text" class="form-control mt-1" id="departemen" name="departemen"
                                        placeholder="Masukkan nama departemen" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fakultasName">Nama Fakultas</label>
                                    <select class="form-control mt-1" id="fakultasName" name="id_fakultas">
                                        <option selected disabled>Pilih Fakultas</option>
                                        @foreach ($fakultasList as $fakultas)
                                            <option value="{{ $fakultas->id_fakultas }}">
                                                {{ $fakultas->fakultas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="aktif">
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            id="nonAktif">
                                        <label class="form-check-label" for="nonAktif">
                                            Non-Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mt-3 justify-content-end">
                                    <a href="/departemenSA" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
