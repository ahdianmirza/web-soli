@extends('layout.admin')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Lab</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
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
                            <form action="/lab/add" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Lab</label>
                                    <input type="text" class="form-control mt-1" id="labName" name="lab"
                                        placeholder="Masukkan nama lab" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="labName">Nama Departemen</label>
                                    <select class="form-control mt-1" id="labName" name="id_departemen">
                                        <option selected disabled>Pilih departemen</option>
                                        @foreach ($departments as $dept)
                                            <option value="{{ $dept->id_departemen }}">
                                                {{ $dept->departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="float-end">
                                    <a href="/lab" class="btn btn-danger edit-close">Batal</a>
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