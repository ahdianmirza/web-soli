@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Edit User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/userSA/update/{{ $selectedUser->id }}" method="post">
                                @csrf
                                @method('put')

                                <div class="form-group mb-3">
                                    <label for="userName">Nama User</label>
                                    <input type="text" class="form-control mt-1" id="userName" name="name"
                                        placeholder="Masukkan nama user" value="{{ $selectedUser->name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control mt-1" id="email" name="email"
                                        placeholder="Masukkan email" value="{{ $selectedUser->email }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mt-1" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_lab">Lab</label>
                                    <select class="form-control mt-1" id="id_lab" name="id_lab">
                                        <option selected disabled>Pilih Lab</option>
                                        @foreach ($labList as $lab)
                                            <option @if ($lab->id_lab == $selectedUser->id_lab) selected @endif
                                                value="{{ $lab->id_lab }}">{{ $lab->lab }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_role">Role</label>
                                    <select class="form-control mt-1" id="id_role" name="id_role">
                                        <option selected disabled>Pilih Role</option>
                                        <option @if ($selectedUser->id_role == 'Superadmin') selected @endif value="Superadmin">
                                            Superadmin</option>
                                        <option @if ($selectedUser->id_role == 'Admin') selected @endif value="Admin">Admin
                                        </option>
                                        <option @if ($selectedUser->id_role == 'User') selected @endif value="User">User
                                        </option>
                                    </select>
                                </div>
                                <div class="d-flex gap-3 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            @if ($selectedUser->id_status == 1) checked @endif id="aktif">
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            @if ($selectedUser->id_status == 0) checked @endif id="nonAktif">
                                        <label class="form-check-label" for="nonAktif">
                                            Non-Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 mt-3 justify-content-end">
                                    <a href="/userSA" class="btn btn-danger">Batal</a>
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
