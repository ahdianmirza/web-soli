@extends('layout.superadmin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/superadmin">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="/userSA/add" style="margin: 20px 0 10px 0;" class="btn btn-primary btn-sm">Tambah
                                <i class="bi bi-plus-lg"></i></a>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama Peminjam</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Role</th>
                                        <th style="text-align: center;">Lab</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $item->name }}</td>
                                            <td style="text-align: center;">{{ $item->email }}</td>
                                            <td style="text-align: center;">{{ $item->id_role }}</td>
                                            <td style="text-align: center;">{{ $item->lab }}</td>
                                            <td style="text-align: center;">
                                                @if ($item->id_status == 1)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Non-Aktif</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;" class="d-flex gap-2 justify-content-center">
                                                <a href="/userSA/edit/{{ $item->id }}" data-bs-toggle="tooltip"
                                                    data-bs-title="Edit" class="btn btn-warning btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>

                                                <form action="/userSA/delete/{{ $item->id }}" method="post"
                                                    id="deleteUserForm-{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button onclick="handleDeleteUser(event, {{ $item->id }})"
                                                        type="submit" class="btn btn-danger btn-sm"><i
                                                            data-bs-toggle="tooltip" data-bs-title="Hapus"
                                                            class="bi bi-trash-fill"></i></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('superadmin.user.user_js')
    </main>

    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
