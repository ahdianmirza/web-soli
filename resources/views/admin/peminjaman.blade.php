@extends('layout.admin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Peminjaman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">peminjaman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                        <a type="button" style="margin-left: 10px; margin-bottom:10px;" class="btn  btn-outline-info btn-sm" onclick="downloadPDFAll()">Download PDF</a>
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Peminjam</th>
                                <th style="text-align: center;">Nama Lab</th>
                                <th style="text-align: center;">Nama Dosen</th>
                                <th style="text-align: center;">Nama Alat</th>
                                <th style="text-align: center;">Spesifikasi</th>
                                <th style="text-align: center;">Jumlah</th>
                                <th style="text-align: center;">Kondisi</th>
                                <th style="text-align: center;">Tanggal Peminjaman</th>
                                <th style="text-align: center;">Waktu</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                            <tr>
                                <td style="text-align: center;">{{$item->nomor}}</td> <!-- Menggunakan nomor urut -->
                                @php
                                $namaUser = DB::table('users')->where('email', $item->email)->value('name');
                                @endphp
                                <td style="text-align: center;">{{$namaUser}}</td>
                                <td>{{$item->lab}}</td>
                                <td>{{$item->dosen}}</td>
                                <td>{{$item->nama_alat}}</td>
                                <td>{{$item->spesifikasi}}</td>
                                <td style="text-align: center;">{{$item->jumlah_pinjam}}</td>
                                <td style="text-align: center;">{{$item->kondisi}}</td>
                                <td style="text-align: center;">{{$item->tanggal_pinjam}}</td>
                                <td style="text-align: center;">
                                    @if ($item->waktu == 1)
                                    <a>08.00 - 09.00</a>
                                    @elseif ($item->waktu == 2)
                                    <a>09.00 - 10.00</a>
                                    @elseif ($item->waktu == 3)
                                    <a>10.00 - 11.00</a>
                                    @elseif ($item->waktu == 4)
                                    <a>11.00 - 12.00</a>
                                    @elseif ($item->waktu == 5)
                                    <a>13.00 - 14.00</a>
                                    @elseif ($item->waktu == 6)
                                    <a>14.00 - 15.00</a>
                                    @elseif ($item->waktu == 7)
                                    <a>15.00 - 16.00</a>
                                    @elseif ($item->waktu == 8)
                                    <a>16.00 - 17.00</a>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->approve == 1)
                                    <span class="badge bg-warning">Menunggu</span>
                                    @elseif ($item->approve == 2)
                                    <span class="badge bg-primary">Setujui</span>
                                    @elseif ($item->approve == 3)
                                    <span class="badge bg-info">Pengecekan</span>
                                    @elseif ($item->approve == 4)
                                    <span class="badge bg-success">Selesai</span>
                                    @elseif ($item->approve == 5)
                                    <span class="badge bg-danger">Tolak</span>
                                    @endif
                                </td>
                                <td style="text-align: center;">
                                    @if ($item->approve == 1 || $item->approve == 3)
                                    <a type="button" data-id="{{$item->id}}" data-approve="{{$item->approve}}" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#peminjamanModal">
                                        Ubah
                                    </a>
                                    @else
                                    <a href="/peminjaman/{{ $item->id }}/batal" class="btn btn-outline-danger btn-sm">
                                        Batalkan
                                    </a>
                                    @endif
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
</main>

<div class="modal fade" id="peminjamanModal" tabindex="-1" aria-labelledby="PeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PeminjamanModalLabel">Approve Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPeminjamanForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="edit_approve" class="col-sm-2 col-form-label">Status Approve</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="approve" id="edit_approve" aria-label="Default select example">
                                <option value="1">Menunggu</option>
                                <option value="2">Setujui</option>
                                <option value="4">Selesai</option>
                                <option value="5">Tolak</option>
                            </select>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($peminjaman as $item)
<form id="batal-peminjaman-{{ $item->id }}" action="{{ route('peminjaman.batal', $item->id) }}" method="POST" style="display: none;">
    @csrf
    <!-- Form fields here -->
</form>
@endforeach
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var peminjamanModal = document.getElementById('peminjamanModal');
    peminjamanModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var approve = button.getAttribute('data-approve');

        var modalTitle = peminjamanModal.querySelector('.modal-title');
        var editForm = document.getElementById('editPeminjamanForm');

        modalTitle.textContent = 'Edit Status Peminjaman ';
        editForm.action = '/peminjaman/' + id;

        editForm.querySelector('#edit_approve').value = approve;
    });
</script>
<script>
    function downloadPDFAll() {
        window.location.href = `/peminjaman/pdfall`;
    }
</script>
@endsection