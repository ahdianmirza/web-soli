@extends('layout.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Alat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Alat</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <a type="button" style="margin-left: 10px; margin-bottom:10px;" class="btn  btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">Tambah Alat</a>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Lab</th>
                                    <th style="text-align: center;">Nama Alat</th>
                                    <th style="text-align: center;">Spesifikasi</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Kondisi</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alatData as $index => $item)
                                <tr>
                                    <td style="text-align: center;">{{$index + 1}}</td>
                                    <td >{{$item->lab}}</td>
                                    <td >{{$item->nama_alat}}</td>
                                    <td >{{$item->spesifikasi}}</td>
                                    <td style="text-align: center;">{{$item->jumlah}}</td>
                                    <td style="text-align: center;">{{$item->kondisi_alat}}</td>
                                    <td style="text-align: center;">
                                        @if ($item->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-outline-warning btn-sm"  data-bs-toggle="modal" data-bs-target="#modalEdit"
                                        data-id="{{ $item->id_alat }}"
                                        data-id_lab="{{ $item->id_lab }}" 
                                        data-lab="{{ $item->lab }}" 
                                        data-nama_alat="{{ $item->nama_alat }}" 
                                        data-spesifikasi="{{ $item->spesifikasi }}"
                                        data-jumlah="{{ $item->jumlah }}"
                                        data-kondisi_alat="{{ $item->kondisi_alat }}"
                                        data-id_status="{{ $item->id_status}}">Edit</button>
                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-id="{{ $item->id_alat }}" data-bs-toggle="modal" data-bs-target="#modalBatalkan">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Add -->
                    <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalAddLabel">Tambah Data Alat</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 24px;"></button>
                                </div>
                                <div class="modal-body">
                                    <form  method="POST">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="id_lab">Nama Laboratorium</label>
                                            <select class="form-control" id="id_lab" name="id_lab" required>
                                                <option value="" selected disabled>Pilih Laboratorium</option>
                                                @foreach($labList as $lab)
                                                    <option value="{{ $lab->id_lab }}">{{ $lab->lab }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alatName">Nama Alat</label>
                                            <input type="text" class="form-control" id="alatName" name="nama_alat" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="spec">Spesifikasi</label>
                                            <input type="text" class="form-control" id="spec" name="spesifikasi" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="kondisi">Kondisi</label>
                                            <input type="text" class="form-control" id="kondisi" name="kondisi_alat" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('addAlatForm').submit();">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalEditLabel">Edit Data Alat</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 24px;"></button>
                                </div>
                                <div class="modal-body">
                                <form action="/alat/{id}" method="POST" id="formEditAlat">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="labName">Nama Laboratorium</label>
                                            <select class="form-control" id="labName" name="lab">
                                                @foreach($labList as $lab)
                                                    <option value="{{ $lab->id_lab }}" 
                                                        @if($lab->id_lab == $item->id_lab) selected @endif>
                                                        {{ $lab->lab }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alatName">Nama Alat</label>
                                            <input type="text" class="form-control" id="alatName" name="nama_alat" value="{{$item->nama_alat}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="spec">Spesifikasi</label>
                                            <input type="text" class="form-control" id="spec" name="spesifikasi" value="{{$item->spesifikasi}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$item->jumlah}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="kondisi">Kondisi</label>
                                            <input type="text" class="form-control" id="kondisi" name="kondisi_alat" value="{{$item->kondisi_alat}}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="id_status">Status</label>
                                            <select class="form-control" id="id_status" name="status">
                                                <option value="1" @if($item->id_status === 1) selected @endif>Aktif</option>
                                                <option value="2" @if($item->id_status === 2) selected @endif>Non-Aktif</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Batalkan -->
                    <div id="modalBatalkan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalBatalkanLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalBatalkanLabel">Konfirmasi Penghapusan</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 24px;"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                <form id="deleteAlatForm" method="POST" action="">
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $('.btn-batalkan').on('click', function() {
            var id = $(this).data('id');

            $('#deleteAlatForm').attr('action', '/masterAlat/' + id + '/delete');
        });

        $('#deleteAlatForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: {
                    _method: 'PUT', 
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#modalBatalkan').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data alat berhasil dihapus!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload(); 
                    });
                },
                error: function(response) {
                    console.log('Error:', response);

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat menghapus data.',
                    });
                }
            });
        });
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#formEditAlat').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: form.serialize(),
                success: function(response) {
                    $('#modalEdit').modal('hide');

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data alat berhasil diperbarui!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload(); 
                    });
                },
                error: function(response) {
                    console.log('Error:', response);

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan saat memperbarui data.',
                    });
                }
            });
        });
    });
  </script>
  <script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            var id_lab = $(this).data('id_lab');
            var lab = $(this).data('lab');
            var nama_alat = $(this).data('nama_alat');
            var spesifikasi = $(this).data('spesifikasi');
            var jumlah = $(this).data('jumlah');
            var kondisi_alat = $(this).data('kondisi_alat');
            var status = $(this).data('id_status');

            $('#formEditAlat').attr('action', '/masterAlat/' + id);

            $('#modalEdit #labName').val(id_lab);
            $('#modalEdit #alatName').val(nama_alat);
            $('#modalEdit #spec').val(spesifikasi);
            $('#modalEdit #jumlah').val(jumlah);
            $('#modalEdit #kondisi').val(kondisi_alat);

            if (status == 1) {
                $('#modalEdit #id_status').val(1);
            } else {
                $('#modalEdit #id_status').val(2);
            }
        });
    });
  </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</main>
@endsection