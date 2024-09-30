@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Dosen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item">Edit Dosen</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/dosenSA/update/{{ $selectedDosen->id_dosen }}" method="post">
                                @csrf
                                @method('put')

                                <div class="form-group mb-3">
                                    <label for="nama_dosen">Nama Dosen</label>
                                    <input type="text" class="form-control mt-1" id="nama_dosen" name="nama_dosen"
                                        placeholder="Masukkan nama dosen" value="{{ $selectedDosen->nama_dosen }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Departemen</label>
                                    <select class="form-control mt-1" id="labName" name="id_departemen">
                                        <option selected disabled>Pilih departemen</option>
                                        @foreach ($departemenList as $dept)
                                            <option @if ($dept->id_departemen == $selectedDosen->id_departemen) selected @endif
                                                value="{{ $dept->id_departemen }}">
                                                {{ $dept->departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="float-end">
                                    <a href="/dosenSA" class="btn btn-danger edit-close">Batal</a>
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
