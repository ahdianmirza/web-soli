@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Fakultas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Edit Fakultas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/fakultasSA/update/{{ $selectedFakultas->id_fakultas }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="fakultas">Nama Fakultas</label>
                                    <input type="text" class="form-control mt-1" id="fakultas" name="fakultas"
                                        value="{{ $selectedFakultas->fakultas }}" placeholder="Masukkan nama fakultas"
                                        required>
                                </div>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            @if ($selectedFakultas->status == 1) checked @endif id="aktif">
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            @if ($selectedFakultas->status == 0) checked @endif id="nonAktif">
                                        <label class="form-check-label" for="nonAktif">
                                            Non-Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mt-3 justify-content-end">
                                    <a href="/fakultasSA" class="btn btn-danger">Batal</a>
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
