@extends('layout.user')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Peminjaman</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item">peminjaman</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body mt-3">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <a type="button" style="margin-left: 10px; margin-bottom:10px;"
                                    class="btn  btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambahPeminjaman">Tambah Peminjaman</a>
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">ID</th>
                                        <th style="text-align: center;">Nama Lab</th>
                                        <th style="text-align: center;">Nama Dosen</th>
                                        <th style="text-align: center;">Nama Alat</th>
                                        <th style="text-align: center;">Spesifikasi</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th style="text-align: center;">Kondisi</th>
                                        <th style="text-align: center;">tanggal peminjaman</th>
                                        <th style="text-align: center;">waktu</th>
                                        <th style="text-align: center;">status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td style="text-align: center;">{{ $item->nomor }}</td>
                                            <!-- Menggunakan nomor urut -->
                                            <td style="text-align: center;">{{ $item->lab }}</td>
                                            <td style="text-align: center;">{{ $item->dosen }}</td>
                                            <td style="text-align: center;">{{ $item->nama_alat }}</td>
                                            <td style="text-align: center;">{{ $item->spesifikasi }}</td>
                                            <td style="text-align: center;">{{ $item->jumlah_pinjam }}</td>
                                            <td style="text-align: center;">{{ $item->kondisi }}</td>
                                            <td style="text-align: center;">{{ $item->tanggal_pinjam }}</td>
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
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            data-id="{{ $item->id }}">Edit</button>
                                                        <form action="{{ route('peminjaman.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">Hapus</button>
                                                        </form>
                                                        @if ($item->approve == 2)
                                                            <form action="{{ route('peminjaman.kembalikan', $item->id) }}"
                                                                method="POST" data-confirm>
                                                                @csrf
                                                                <button type="submit"
                                                                    class="dropdown-item">Kembalikan</button>
                                                            </form>
                                                        @elseif ($item->approve == 3)
                                                            <form
                                                                action="{{ route('peminjaman.batalpengembalian', $item->id) }}"
                                                                method="POST" data-confirm>
                                                                @csrf
                                                                <button type="submit"
                                                                    class="dropdown-item">Batalkan</button>
                                                            </form>
                                                        @else
                                                            <button type="submit" class="dropdown-item"
                                                                disabled>kembalikan</button>
                                                        @endif
                                                        <button type="button" class="dropdown-item"
                                                            onclick="downloadPDF({{ $item->id }})">PDF</button>
                                                    </ul>
                                                </div>
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
    <!-- Modal Tambah Peminjaman -->
    <div class="modal modal-lg fade" id="tambahPeminjaman" tabindex="-1" aria-labelledby="tambahPeminjamanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPeminjamanLabel">Tambah Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.peminjaman.store') }}" method="POST" class="container">
                        @csrf
                        <!-- Dropdown Lab -->
                        <div class="mb-3">
                            <label for="id_lab" class="col-form-label">Lab</label>
                            <select id="id_lab" name="id_lab" class="form-select">
                                <option value="">Pilih Lab</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id_lab }}">{{ $lab->lab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 d-flex flex-column row">
                            <label for="id_alat" class="col-form-label">Nama Alat</label>
                            <select class="d-block col id_alat" multiple id="id_alat" name="id_alat"
                                placeholder="Pilih alat" data-search="true" data-silent-initial-value-set="true"
                                style="max-width: 100%;">
                                @foreach ($alats as $alat)
                                    <option value="{{ $alat->id_alat }}">{{ $alat->nama_alat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dosen" class="form-label">Dosen</label>
                            <select id="dosen" name="dosen" class="form-control" required>
                                <option value="">Pilih Dosen</option>
                                <option value="Prof. Dr. Ir. Iriani Setyaningsih, MS">Prof. Dr. Ir. Iriani Setyaningsih, MS
                                </option>
                                <option value="Prof. Dr. Sri Purwaningsih, S.Pi, M.Si">Prof. Dr. Sri Purwaningsih, S.Pi,
                                    M.Si</option>
                                <option value="Prof. Dr. Ir. Joko Santoso, M.Si">Prof. Dr. Ir. Joko Santoso, M.Si</option>
                                <option value="Prof. Dr. Ir. Nurjanah, MS">Prof. Dr. Ir. Nurjanah, MS</option>
                                <option value="Prof. Dr. Tati Nurhayati, S.Pi, M.Si">Prof. Dr. Tati Nurhayati, S.Pi, M.Si
                                </option>
                                <option value="Prof. Dr. Mala Nurilmala, S.Pi, M.Si">Prof. Dr. Mala Nurilmala, S.Pi, M.Si
                                </option>
                                <option value="Prof. Dr. Sugeng Heri Suseno, S.Pi, M.Si">Prof. Dr. Sugeng Heri Suseno,
                                    S.Pi, M.Si</option>
                                <option value="Prof. Dr. Uju, S.Pi, M.Si">Prof. Dr. Uju, S.Pi, M.Si</option>
                                <option value="Dr. Desniar, S.Pi, M.Si">Dr. Desniar, S.Pi, M.Si</option>
                                <option value="Dr.rer.nat, Kustiariyah, S.Pi, M.Si">Dr.rer.nat, Kustiariyah, S.Pi, M.Si
                                </option>
                                <option value="Dr. Eng. Safrina Dyah H., S.Pi, M.Si">Dr. Eng. Safrina Dyah H., S.Pi, M.Si
                                </option>
                                <option value="Dr. Ir. Wini Trilaksani, M.Sc">Dr. Ir. Wini Trilaksani, M.Sc</option>
                                <option value="Dr. Ir. Ruddy Suwandi, MS. Mphil">Dr. Ir. Ruddy Suwandi, MS. Mphil</option>
                                <option value="Dr. Ir. Agoes Mardiono Jacoeb, Dipl. Biol">Dr. Ir. Agoes Mardiono Jacoeb,
                                    Dipl. Biol</option>
                                <option value="Dr. Roni Nugraha, S.Si, M.Sc">Dr. Roni Nugraha, S.Si, M.Sc</option>
                                <option value="Dr.rer.nat. Asadatun Abdullah, S.Pi.,M.Si">Dr.rer.nat. Asadatun Abdullah,
                                    S.Pi.,M.Si</option>
                                <option value="Dr. Ir. Bustami, M.Sc">Dr. Ir. Bustami, M.Sc</option>
                                <option value="Dr. Eng. Wahyu Ramadhan, S.Pi, M.Si">Dr. Eng. Wahyu Ramadhan, S.Pi, M.Si
                                </option>
                                <option value="Ir. Heru Sumaryanto, M.Si">Ir. Heru Sumaryanto, M.Si</option>
                                <option value="Bambang Riyanto, S.Pi, M.Si">Bambang Riyanto, S.Pi, M.Si</option>
                                <option value="Rizfi Pari, S.T, M.Si">Rizfi Pari, S.T, M.Si</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_pinjam" class="form-label">Jumlah Peminjaman</label>
                            <input type="number" class="form-control" name="jumlah_pinjam" id="jumlah_pinjam" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <select class="form-select" name="waktu" id="waktu" required>
                                <option value="">Waktu Peminjaman</option>
                                <option value="1">08.00 - 09.00</option>
                                <option value="2">09.00 - 10.00</option>
                                <option value="3">10.00 - 11.00</option>
                                <option value="4">11.00 - 12.00</option>
                                <option value="5">13.00 - 14.00</option>
                                <option value="6">14.00 - 15.00</option>
                                <option value="7">15.00 - 16.00</option>
                                <option value="8">16.00 - 17.00</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $user->email }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Peminjaman -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="/user/peminjaman/store" method="POST">
                        @csrf
                        @method('PUT') <!-- Ini penting untuk mengirimkan request PUT -->
                        <div class="mb-3">
                            <label for="edit_id" class="form-label">ID Peminjaman</label>
                            <input type="text" class="form-control" name="id" id="edit_id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit_id_lab" class="form-label">Lab</label>
                            <select id="edit_id_lab" name="id_lab" class="form-control">
                                <option value="">Pilih Lab</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id_lab }}">{{ $lab->lab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="edit_id_alat" class="form-label">Nama Alat</label>
                            <select class="form-select" name="id_alat" id="edit_id_alat" required>
                                <option value="">Pilih Alat</option>
                                @foreach ($alats as $item)
                                    <option value="{{ $item->id_alat }}" data-id_lab="{{ $item->id_lab }}">
                                        {{ $item->nama_alat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_dosen" class="form-label">Dosen</label>
                            <select id="edit_dosen" name="dosen" class="form-select" required>
                                <option value="">Pilih Dosen</option>
                                <option value="Prof. Dr. Ir. Iriani Setyaningsih, MS">Prof. Dr. Ir. Iriani Setyaningsih, MS
                                </option>
                                <option value="Prof. Dr. Sri Purwaningsih, S.Pi, M.Si">Prof. Dr. Sri Purwaningsih, S.Pi,
                                    M.Si</option>
                                <option value="Prof. Dr. Ir. Joko Santoso, M.Si">Prof. Dr. Ir. Joko Santoso, M.Si</option>
                                <option value="Prof. Dr. Ir. Nurjanah, MS">Prof. Dr. Ir. Nurjanah, MS</option>
                                <option value="Prof. Dr. Tati Nurhayati, S.Pi, M.Si">Prof. Dr. Tati Nurhayati, S.Pi, M.Si
                                </option>
                                <option value="Prof. Dr. Mala Nurilmala, S.Pi, M.Si">Prof. Dr. Mala Nurilmala, S.Pi, M.Si
                                </option>
                                <option value="Prof. Dr. Sugeng Heri Suseno, S.Pi, M.Si">Prof. Dr. Sugeng Heri Suseno,
                                    S.Pi, M.Si</option>
                                <option value="Prof. Dr. Uju, S.Pi, M.Si">Prof. Dr. Uju, S.Pi, M.Si</option>
                                <option value="Dr. Desniar, S.Pi, M.Si">Dr. Desniar, S.Pi, M.Si</option>
                                <option value="Dr.rer.nat, Kustiariyah, S.Pi, M.Si">Dr.rer.nat, Kustiariyah, S.Pi, M.Si
                                </option>
                                <option value="Dr. Eng. Safrina Dyah H., S.Pi, M.Si">Dr. Eng. Safrina Dyah H., S.Pi, M.Si
                                </option>
                                <option value="Dr. Ir. Wini Trilaksani, M.Sc">Dr. Ir. Wini Trilaksani, M.Sc</option>
                                <option value="Dr. Ir. Ruddy Suwandi, MS. Mphil">Dr. Ir. Ruddy Suwandi, MS. Mphil</option>
                                <option value="Dr. Ir. Agoes Mardiono Jacoeb, Dipl. Biol">Dr. Ir. Agoes Mardiono Jacoeb,
                                    Dipl. Biol</option>
                                <option value="Dr. Roni Nugraha, S.Si, M.Sc">Dr. Roni Nugraha, S.Si, M.Sc</option>
                                <option value="Dr.rer.nat. Asadatun Abdullah, S.Pi.,M.Si">Dr.rer.nat. Asadatun Abdullah,
                                    S.Pi.,M.Si</option>
                                <option value="Dr. Ir. Bustami, M.Sc">Dr. Ir. Bustami, M.Sc</option>
                                <option value="Dr. Eng. Wahyu Ramadhan, S.Pi, M.Si">Dr. Eng. Wahyu Ramadhan, S.Pi, M.Si
                                </option>
                                <option value="Ir. Heru Sumaryanto, M.Si">Ir. Heru Sumaryanto, M.Si</option>
                                <option value="Bambang Riyanto, S.Pi, M.Si">Bambang Riyanto, S.Pi, M.Si</option>
                                <option value="Rizfi Pari, S.T, M.Si">Rizfi Pari, S.T, M.Si</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_jumlah_pinjam" class="form-label">Jumlah Peminjaman</label>
                            <input type="number" class="form-control" name="jumlah_pinjam" id="edit_jumlah_pinjam"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tanggal_pinjam" id="edit_tanggal_pinjam"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_waktu" class="form-label">Waktu</label>
                            <select class="form-select" name="waktu" id="edit_waktu" required>
                                <option value="1">08.00 - 09.00</option>
                                <option value="2">09.00 - 10.00</option>
                                <option value="3">10.00 - 11.00</option>
                                <option value="4">11.00 - 12.00</option>
                                <option value="5">13.00 - 14.00</option>
                                <option value="6">14.00 - 15.00</option>
                                <option value="7">15.00 - 16.00</option>
                                <option value="8">16.00 - 17.00</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button[data-bs-toggle="modal"]').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    if (id) {
                        fetch(`/peminjaman/edit/${id}`)
                            .then(response => response.json())
                            .then(data => {
                                // Mengisi form edit dengan data yang diambil
                                document.getElementById('edit_id').value = data.peminjaman.id;
                                document.getElementById('edit_id_lab').value = data.peminjaman
                                    .id_lab;
                                document.getElementById('edit_id_alat').value = data.peminjaman
                                    .id_alat;
                                document.getElementById('edit_dosen').value = data.peminjaman
                                    .dosen;
                                document.getElementById('edit_jumlah_pinjam').value = data
                                    .peminjaman.jumlah_pinjam;
                                document.getElementById('edit_tanggal_pinjam').value = data
                                    .peminjaman.tanggal_pinjam;
                                document.getElementById('edit_waktu').value = data.peminjaman
                                    .waktu;

                                // Update form action
                                const editForm = document.getElementById('editForm');
                                if (editForm) {
                                    editForm.action = `/peminjamanUser/${data.peminjaman.id}`;
                                }

                                // Filter opsi alat berdasarkan lab yang dipilih
                                filterAlatOptions(data.peminjaman.id_lab);
                            });
                    }
                });
            });

            function filterAlatOptions(selectedLabId) {
                var alatSelect = document.getElementById('edit_id_alat');
                var alatOptions = alatSelect.querySelectorAll('option');

                // Tampilkan semua opsi alat jika lab belum dipilih
                if (selectedLabId === "") {
                    alatOptions.forEach(function(option) {
                        option.style.display = '';
                    });
                    return;
                }

                // Tampilkan opsi alat yang sesuai dengan lab yang dipilih
                alatOptions.forEach(function(option) {
                    if (option.getAttribute('data-id_lab') === selectedLabId) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                });
            }

            // Event listener untuk memfilter alat saat lab dipilih
            document.getElementById('edit_id_lab').addEventListener('change', function() {
                var selectedLabId = this.value;
                filterAlatOptions(selectedLabId);

                // Setel ulang pilihan alat ke default (tidak ada yang dipilih)
                document.getElementById('edit_id_alat').value = '';
            });

            // Panggil fungsi filter saat halaman dimuat untuk menyaring opsi alat sesuai lab yang sudah dipilih
            const selectedLabId = document.getElementById('edit_id_lab').value;
            if (selectedLabId) {
                filterAlatOptions(selectedLabId);
            }
        });
    </script>
    <script>
        function downloadPDF(id) {
            window.location.href = `/peminjaman/${id}/pdf`;
        }
    </script>
    <script>
        function downloadPDFAll() {
            window.location.href = `/peminjaman/pdfall`;
        }
    </script>
    <script>
        document.getElementById('id_lab').addEventListener('change', function() {
            var selectedLabId = this.value;
            var alatSelect = document.getElementById('id_alat');
            var alatOptions = alatSelect.querySelectorAll('option');

            // Tampilkan semua opsi alat jika lab belum dipilih
            if (selectedLabId === "") {
                alatOptions.forEach(function(option) {
                    option.style.display = '';
                });
                return;
            }

            // Tampilkan opsi alat yang sesuai dengan lab yang dipilih
            alatOptions.forEach(function(option) {
                if (option.getAttribute('data-id_lab') === selectedLabId) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });

            // Setel ulang pilihan alat ke default (tidak ada yang dipilih)
            alatSelect.value = '';
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal_pinjam').setAttribute('min', today);
        });
    </script>

    <script type="text/javascript" src="js/virtual-select.min.js"></script>
    <script>
        VirtualSelect.init({
            ele: '#id_alat'
        });
    </script>
@endsection
