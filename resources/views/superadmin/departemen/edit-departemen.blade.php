@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Edit Departemen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/departemenSA/update/{{ $selectedDepartemen->id_departemen }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="departemen">Nama Departemen</label>
                                    <input type="text" class="form-control mt-1" id="departemen" name="departemen"
                                        value="{{ $selectedDepartemen->departemen }}" placeholder="Masukkan nama departemen"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fakultasName">Nama Fakultas</label>
                                    <select class="form-control mt-1" id="fakultasName" name="id_fakultas">
                                        <option selected disabled>Pilih Fakultas</option>
                                        @foreach ($fakultasList as $fakultas)
                                            <option @if ($fakultas->id_fakultas == $selectedDepartemen->id_fakultas) selected @endif
                                                value="{{ $fakultas->id_fakultas }}">
                                                {{ $fakultas->fakultas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            @if ($selectedDepartemen->status == 1) checked @endif id="aktif">
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            @if ($selectedDepartemen->status == 0) checked @endif id="nonAktif">
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
