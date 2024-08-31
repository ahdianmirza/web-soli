@extends('layout.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Departemen</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Departemen</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <a type="button" style="margin-left: 10px; margin-bottom:10px;" class="btn  btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahDepartemen">Tambah Departemen</a>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Nama Departemen</th>
                                    <th style="text-align: center;">Foto</th>
                                    <th style="text-align: center;">Nama Fakultas</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $departemen as $item )
                                <tr>
                                    <td style="text-align: center;">{{$item->nomor}}</td> <!-- Menggunakan nomor urut -->
                                    <td style="text-align: center;">{{$item->departemen}}</td>
                                    <td style="text-align: center;">
                                        @if($item->img)
                                        <img src="{{ asset('img/departemen/' . $item->img) }}" alt="Gambar" width="100">
                                        @else
                                        <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{$item->fakultas}}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editDepartemenModal" data-id_departemen="{{ $item->id_departemen }}" data-departemen="{{ $item->departemen }}" data-id_fakultas="{{ $item->id_fakultas }}" data-status="{{ $item->status }}" data-img="{{ $item->img }}">Edit</button>
                                        <form action="{{ route('departemen.delete', $item->id_departemen) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
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


    <div class="modal fade" id="tambahDepartemen" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah Departemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <h5 style="margin-left:10px;" class="card-title">Lengkapi semua data</h5>
                    <div class="card-body">
                        <form action="{{ route('departemen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="id_fakultas" class="col-sm-2 col-form-label">ID Fakultas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="id_fakultas" value="{{ $user->id_fakultas }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="departemen">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="img" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="img">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editDepartemenModal" tabindex="-1" aria-labelledby="editDepartemenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDepartemenModalLabel">Edit Departemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDepartemenForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="editDepartemen" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editDepartemen" name="Departemen">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="editid_fakultas" class="col-sm-2 col-form-label">id_fakultas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="editid_fakultas" name="id_fakultas" value="{{$user->id_fakultas}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="editimg" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="editImg" name="img">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update Departemen</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<script>
    var editDepartemenModal = document.getElementById('editDepartemenModal');
    editDepartemenModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var id_departemen = button.getAttribute('data-id_departemen');
        var departemen = button.getAttribute('data-departemen');
        var id_fakultas = button.getAttribute('data-id_fakultas');
        var status = button.getAttribute('data-status');
        var img = button.getAttribute('data-img');

        var modal = this;
        modal.querySelector('.modal-title').textContent = 'Edit Departemen ' + id_departemen;
        modal.querySelector('#editDepartemen').value = departemen;
        modal.querySelector('#editid_fakultas').value = id_fakultas;
        modal.querySelector('#editImg').value = img;

        var form = modal.querySelector('#editDepartemenForm');
        form.action = '/departemen/' + id_departemen;
    });
</script>


@endsection