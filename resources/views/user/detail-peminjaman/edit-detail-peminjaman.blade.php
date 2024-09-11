@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Edit Detail Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Edit Detail Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/detail-peminjamanUser/{{ $selectedDetail->id }}/update" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="id_alat">Nama Alat</label>
                                    <select class="form-control mt-1" id="id_alat" name="id_alat">
                                        <option selected disabled>Pilih alat</option>
                                        @foreach ($alatList as $alat)
                                            <option value="{{ $alat->id_alat }}"
                                                @if ($alat->id_alat == $selectedDetail->id_alat) selected @endif>
                                                {{ $alat->nama_alat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="qty_borrow">Jumlah Peminjaman</label>
                                    <input type="number" class="form-control mt-1" id="qty_borrow" name="qty_borrow"
                                        placeholder="Masukkan jumlah peminjaman" value="{{ $selectedDetail->qty_borrow }}"
                                        required>
                                </div>

                                <div class="float-end">
                                    <a href="/detail-peminjamanUser/{{ $selectedDetail->id_header }}"
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
