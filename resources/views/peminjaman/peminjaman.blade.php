<!DOCTYPE html>
<html lang="en">
<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">

	<!-- TITLE -->
	<title>Sistem Online Laboratorium IPB</title>

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700%7CRoboto:400,400i,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<!-- LIBRARIES -->
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- CUSTOM STYLES -->
    <style>
        #borrowForm {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body class="service-page service-page-04">

	<!-- preloader -->
	<div class="corporex-preloader">
		<div class="spinner-wrapper">
			<div class="spinner"></div>
		</div><!-- .spinner-wrapper -->
	</div> <!-- .corporex-preloader -->
	
	<header class="site-header">
		<nav class="navbar corporex-navbar navbar-01">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars"></i>
					</button>

					<a class="navbar-brand" href="#"><img src="img/ipb_2.png" width="100 px" height="68 px" alt="Logo IPB"></a>

				</div> <!-- .navbar-header -->

				<div class="collapse navbar-collapse navbar-items" id="navbar-items">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="/">Beranda</a>
						</li>
						<li><a href="/fakultas">Fakultas</a></li>
						<li class="active"><a href="/peminjaman">Peminjaman Alat</a></li>
						<li><a href="/berita">Berita</a></li>
						<li><a href="/kontak">Kontak</a></li>
						
					</ul> <!-- .nav navbar-nav -->
				</div> <!-- .collapse navbar-collapse -->

			</div> <!-- .container -->
		</nav> <!-- .navbar -->
	</header> <!-- .site-header -->

	<section class="hero-area">
		<div class="page-title-banner">
			<div class="container">
				<div class="content-wrapper">
					<h2>Peminjaman Alat</h2>
					<ul class="bread-crumb">
						<li><a href="/">Beranda</a></li>
						<li><a href="/peminjaman">Peminjaman Alat</a></li>
					</ul>
				</div> <!-- .content-wrapper -->
			</div> <!-- .container -->
		</div> <!-- .page-title-banner -->
	</section> <!-- .hero-area -->

	<section class="service-section service-03 section-block">
		<div class="container">
			<div class="section-title">
                <div class="row">
                    <div class="col-md-12">
                        <button id="showFormBtn" class="btn btn-primary">+ Ajukan peminjaman alat</button>
                        <form id="borrowForm">
                            <div class="form-group">
                                <label for="labName">Nama Laboratorium</label>
                                <input type="text" class="form-control" id="labName" required>
                            </div>
                            <div class="form-group">
                                <label for="dosen">Dosen Pembimbing</label>
                                <input type="text" class="form-control" id="dosen" required>
                            </div>
                            <div class="form-group">
                                <label for="alatName">Nama Alat</label>
                                <input type="text" class="form-control" id="alatName" required>
                            </div>
                            <div class="form-group">
                                <label for="spec">Spesifikasi</label>
                                <input type="text" class="form-control" id="spec" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Jumlah</label>
                                <input type="number" class="form-control" id="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="startDate">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" id="startDate" required>
                            </div>
                            <div class="form-group">
                                <label for="startTime">Waktu Mulai</label>
                                <input type="time" class="form-control" id="startTime" required>
                            </div>
                            <div class="form-group">
                                <label for="endTime">Waktu Selesai</label>
                                <input type="time" class="form-control" id="endTime" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
				<div class="row">
				    <div class="col-md-12">
                    <table id="tableLab170" class="table corporex-table corporex-table-02">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Laboratorium</th>
                                <th class="text-center">Dosen Pembimbing</th>
                                <th class="text-center">Nama Alat</th>
                                <th class="text-center">Spesifikasi</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Tanggal Peminjaman</th>
                                <th class="text-center">Waktu Mulai</th>
                                <th class="text-center">Waktu Selesai</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
            
                            <tr>
                                <th class="text-center">1</th>
                                <td class="text-center">Laboratorium Kultur Jaringan 1</td>
                                <td>Prof. Dr. Sugeng Heri Suseno, S.Pi, M.Si</td>
                                <td>Elektronik Top Loading</td>
                                <td>Merk : AND. Type : 6F 300. 12 V. 0,3 W</td>
                                <td class="text-center">1</td>
                                <td class="text-center">21/07/2024</td>
                                <td class="text-center">08.00</td>
                                <td class="text-center">10.00</td>
                                <td class="text-center">
                                    <span class="label label-warning">Dipinjam</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                            <i class="fa fa-ellipsis-v dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown"></i>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" class="btn-kembalikan" data-toggle="modal" data-target="#modalKembalikan">Kembalikan</a></li>
                                            <li><a href="#" class="btn-edit" data-toggle="modal" data-target="#modalEdit">Edit</a></li>
                                            <li><a href="#" class="btn-batalkan" data-toggle="modal" data-target="#modalBatalkan">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
            
                        </tbody>
                    </table>

                    <!-- Modal Kembalikan -->
                <div id="modalKembalikan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalKembalikanLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalKembalikanLabel">Konfirmasi Pengembalian</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin mengembalikan alat ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-primary">Ya, Kembalikan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalEditLabel">Edit Data Peminjaman</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="labName">Nama Laboratorium</label>
                                        <input type="text" class="form-control" id="labName" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dosen">Dosen Pembimbing</label>
                                        <input type="text" class="form-control" id="dosen" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alatName">Nama Alat</label>
                                        <input type="text" class="form-control" id="alatName" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="spec">Spesifikasi</label>
                                        <input type="text" class="form-control" id="spec" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="tglPeminjaman">Tanggal Peminjaman</label>
                                        <input type="date" class="form-control" id="tglPeminjaman">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktuMulai">Waktu Mulai</label>
                                        <input type="time" class="form-control" id="waktuMulai">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktuSelesai">Waktu Selesai</label>
                                        <input type="time" class="form-control" id="waktuSelesai">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Batalkan -->
                <div id="modalBatalkan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalBatalkanLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalBatalkanLabel">Konfirmasi Penghapusan</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus peminjaman ini?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-danger">Ya, Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
				
			    </div>
				</div> <!-- .row -->
			</div> 
		</div> <!-- .container -->
	</section> <!-- .service-section -->

    

	<footer class="site-footer">
    <div class="footer-blocks">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-about">
                    <h3 class="widget-title">Kontak</h3> 
                    <p style="font-weight:bold">
                        Jl. Raya Dramaga 
                        Kampus IPB Dramaga Bogor 
                        16680 West Java, Indonesia 
                    </p>
                    <p style="font-weight:bold">
                        +62 251 8622642
                    </p>
                    <p style="font-weight:bold">
                        ask@apps.ipb.ac.id
                    </p>
                    <ul class="list-inline footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul> <!-- .footer-social -->
                </div> <!-- col-md-4 footer-about -->
                <div class="col-md-4 widget widget-gallery">
                    <h3 class="widget-title">Support</h3> 
                    <p class="bold-text">
                        <a href="https://ict.ipb.ac.id/layanan-helpdesk/">
                            IPB Mobile</a>
                    </p>
                    <p class="bold-text">
                        <a href="https://apps.ipb.ac.id/">
                            IPB Apps</a>
                    </p>
                    <p class="bold-text">
                        <a href="https://ict.ipb.ac.id/layanan-helpdesk/">
                            IPB Mobile</a>
                    </p>
                </div> <!-- col-md-4 widget-gallery -->
                <div class="col-md-4 widget widget-gallery">
                    <h3 class="widget-title">Quick Links</h3>
                    <p class="bold-text">
                        <a href="https://repository.ipb.ac.id/">
                            Scientific Repository</a>
                    </p>
                    <p class="bold-text">
                        <a href="https://journal.ipb.ac.id/">
                            Electronic Journal</a>
                    </p>
                    <p class="bold-text">
                        <a href="https://class.ipb.ac.id/">
                            e-Learning</a>
                    </p>
                </div> <!-- col-md-4 widget-gallery -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .footer-blocks -->
    <div class="bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>All rights reserved &copy; 2018 <strong>Storm &amp; Rain</strong></p>
                </div> <!-- .col-md-6 -->
                <div class="col-md-6">
                    <ul class="bottom-links">
                        <li><a href="#">Terms &amp; Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help</a></li>
                    </ul> <!-- .bottom-links -->
                </div> <!-- .col-md-6 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .bottom-bar -->
</footer> <!-- .site-footer -->

	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
	<script src="js/script.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function() {
                $(this).next('.dropdown-menu').toggleClass('show');
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('.btn-group').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });
        });
    </script>

    <!-- CUSTOM SCRIPT -->
    <script>
        document.getElementById('showFormBtn').addEventListener('click', function() {
            var form = document.getElementById('borrowForm');
            if (form.style.display === 'none') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        });
    </script>
</body>
</html>