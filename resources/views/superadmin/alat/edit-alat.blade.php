@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Alat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
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
                            <form action="/alatSA/update/{{ $selectedAlat->id_alat }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Laboratorium</label>
                                    <select class="form-control" id="labName" name="id_lab">
                                        <option selected disabled>Pilih laboratorium</option>
                                        @foreach ($labList as $lab)
                                            <option @if ($lab->id_lab == $selectedAlat->id_lab) selected @endif
                                                value="{{ $lab->id_lab }}">
                                                {{ $lab->lab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama_alat">Nama Alat</label>
                                    <input type="text" class="form-control mt-1" id="nama_alat" name="nama_alat"
                                        placeholder="Masukkan nama alat" value="{{ $selectedAlat->nama_alat }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="spec">Spesifikasi</label>
                                    <input type="text" class="form-control" id="spec" name="spesifikasi"
                                        placeholder="Masukkan spesifikasi" value="{{ $selectedAlat->spesifikasi }}"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                                        placeholder="Masukkan jumlah" value="{{ $selectedAlat->jumlah }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kondisi">Kondisi</label>
                                    <input type="text" class="form-control" id="kondisi" name="kondisi_alat"
                                        placeholder="Masukkan kondisi alat" value="{{ $selectedAlat->kondisi_alat }}"
                                        required>
                                </div>

                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="aktif" @if ($selectedAlat->status == 1) checked @endif>
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            id="nonAktif" @if ($selectedAlat->status == 0) checked @endif>
                                        <label class="form-check-label" for="nonAktif">
                                            Non-Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mt-3 justify-content-end">
                                    <a href="/alatSA" class="btn btn-danger">Batal</a>
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