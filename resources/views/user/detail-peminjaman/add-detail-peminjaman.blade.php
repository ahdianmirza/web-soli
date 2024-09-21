@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Tambah Detail Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Tambah Detail Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/detail-peminjamanUser/{{ $id_selectedHeader }}/add" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="id_alat">Nama Alat</label>
                                    <select class="form-control mt-1" id="id_alat" name="id_alat">
                                        <option selected disabled>Pilih alat</option>
                                        @foreach ($alatList as $alat)
                                            <option value="{{ $alat->id_alat }}">
                                                {{ $alat->nama_alat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="qty_borrow">Jumlah Alat</label>
                                    <input type="number" class="form-control mt-1" id="qty_borrow" name="qty_borrow"
                                        placeholder="Masukkan jumlah alat" required>
                                </div>

                                <div class="float-end">
                                    <a href="/detail-peminjamanUser/{{ $id_selectedHeader }}"
                                        class="btn btn-danger edit-close">Batal</a>
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
