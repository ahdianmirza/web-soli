@extends('layout.user')
@section('content')
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Edit Formulir Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">Edit Formulir Peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/header-peminjamanUser/{{ $selectedHeader->id }}/edit" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="header_name">Nama Formulir</label>
                                    <input type="text" class="form-control mt-1" id="header_name" name="header_name"
                                        value="{{ $selectedHeader->header_name }}" placeholder="Masukkan nama formulir"
                                        required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Laboratorium</label>
                                    <select class="form-control mt-1" id="labName" name="id_lab">
                                        <option selected disabled>Pilih laboratorium</option>
                                        @foreach ($labList as $lab)
                                            <option value="{{ $lab->id_lab }}"
                                                @if ($lab->id_lab == $selectedHeader->id_lab) selected @endif>
                                                {{ $lab->lab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="dosenName">Nama Dosen Pembimbing</label>
                                    <select class="form-control mt-1" id="dosenName" name="dosen">
                                        <option selected disabled>Pilih dosen pembimbing</option>
                                        @foreach ($dosenList as $dosen)
                                            <option value="{{ $dosen->nama_dosen }}"
                                                @if ($dosen->nama_dosen == $selectedHeader->dosen) selected @endif>
                                                {{ $dosen->nama_dosen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" class="form-control mt-1" name="tanggal_pinjam"
                                        value="{{ $selectedHeader->tanggal_pinjam }}" id="tanggal_pinjam" required>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="start_time">Waktu Mulai</label>
                                            <input type="time" class="form-control mt-1" name="start_time"
                                                value="{{ date('H:i', strtotime($selectedHeader->start_time)) }}"
                                                id="start_time" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="end_time">Waktu Selesai</label>
                                            <input type="time" class="form-control mt-1" name="end_time" id="end_time"
                                                value="{{ date('H:i', strtotime($selectedHeader->end_time)) }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 visually-hidden">
                                    <input type="text" class="form-control mt-1" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="Masukkan nama email" required>
                                </div>

                                <div class="form-group mb-3 visually-hidden">
                                    <input type="text" class="form-control mt-1" id="user_id" name="user_id"
                                        value="{{ $user->id }}" placeholder="Masukkan nama email" required>
                                </div>

                                <div class="float-end">
                                    <a href="/header-peminjamanUser" class="btn btn-danger edit-close">Batal</a>
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
