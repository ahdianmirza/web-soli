@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah Lab</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Tambah Lab</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/labSA/store" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="lab">Nama Lab</label>
                                    <input type="text" class="form-control mt-1" id="lab" name="lab"
                                        placeholder="Masukkan nama lab" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="departemenName">Nama Departemen</label>
                                    <select class="form-control mt-1" id="departemenName" name="id_departemen">
                                        <option selected disabled>Pilih Departemen</option>
                                        @foreach ($departemenList as $departemen)
                                            <option value="{{ $departemen->id_departemen }}">
                                                {{ $departemen->departemen }}
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
