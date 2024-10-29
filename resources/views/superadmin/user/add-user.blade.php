@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Tambah User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">Tambah User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body mt-3">
                            <form action="/userSA/store" method="post">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="userName">Nama User</label>
                                    <input type="text" class="form-control mt-1" id="userName" name="name"
                                        placeholder="Masukkan nama user" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control mt-1" id="email" name="email"
                                        placeholder="Masukkan email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mt-1" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_role">Role</label>
                                    <select onchange="onChangeUser(event)" class="form-control mt-1" id="id_role"
                                        name="id_role">
                                        <option selected disabled>Pilih Role</option>
                                        <option value="Superadmin">Superadmin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="id_lab">Lab</label>
                                    <select class="form-control mt-1" id="id_lab" name="id_lab">
                                        <option selected disabled>Pilih Lab</option>
                                        @foreach ($labList as $lab)
                                            <option value="{{ $lab->id_lab }}">{{ $lab->lab }}
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
                                    <a href="/userSA" class="btn btn-danger">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            const onChangeUser = (e) => {
                console.info("lab value: ", e.target.value);
                const idLabInput = document.getElementById("id_lab");
                let userRole = e.target.value;
                if (userRole == "User" || userRole == "Superadmin") {
                    idLabInput.disabled = true;
                } else {
                    idLabInput.disabled = false;
                }
            }
        </script>

    </main>
@endsection
