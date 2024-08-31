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

                    <a class="navbar-brand"><img src="img/ipb_2.png" width="100 px" height="68 px" alt="Logo IPB"></a>

                </div> <!-- .navbar-header -->

                <div class="collapse navbar-collapse navbar-items" id="navbar-items">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/login">Login</a></li>
						<li class = "active">
							<a href="/">Beranda</a>
						</li>
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
                    <h2>Departemen ITK</h2>
                    <ul class="bread-crumb">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/fpik">Fakultas Perikanan dan Ilmu Kelautan</a></li>
                        <li><a href="/itk">Departemen ITK</a></li>
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
                        <h3>Deskripsi Singkat</h3>
                        <p>
                            --
                        </p>
                        <h3>Laboratorium</h3>
                        <div class="panel-group corporex-accordion accordion-style-03 has-num" id="accordion-11">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse96">
                                            <span class="acc-num">01</span>
                                            Laboratorium Akustik/Watertank
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse96" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>

                                        </p>
                                        <div class="row search-container">
                                            <div class="col-sm-12">
                                                <form class="form-inline">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="searchLab157" placeholder="Search">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table id="tableLab157" class="table corporex-table corporex-table-02">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Alat</th>
                                                    <th class="text-center">Spesifikasi</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">Kondisi Alat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($alat->where('id_lab', 157) as $index => $item)
                                                <tr>
                                                    <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $item->nama_alat }}</td>
                                                    <td>{{ $item->spesifikasi }}</td>
                                                    <td class="text-center">{{ $item->jumlah }}</td>
                                                    <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse97">
                                                <span class="acc-num">02</span>
                                                Bengkel/Workshop
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse97" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab158" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab158" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 158) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse98">
                                                <span class="acc-num">03</span>
                                                Laboratorium Sistem Informasi Geografis Kelautan
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse98" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab159" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab159" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 159) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse99">
                                                <span class="acc-num">04</span>
                                                Laboratorium Komputer
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse99" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab160" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab160" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 160) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse100">
                                                <span class="acc-num">05</span>
                                                Laboratorium Pengindraan Jauh dan Biooptik Kelautan
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse100" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab161" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab161" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 161) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse101">
                                                <span class="acc-num">06</span>
                                                Laboratorium Pemetaan dan Pemodelan Spasial
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse101" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab162" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab162" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 162) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse102">
                                                <span class="acc-num">07</span>
                                                Lab Oseanografi Fisik
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse102" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab163" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab163" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 163) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse103">
                                                <span class="acc-num">08</span>
                                                Lab Oseanografi Kimiawi
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse103" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab164" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab164" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 164) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse104">
                                                <span class="acc-num">09</span>
                                                Lab Oseanografi Bio-Geologi
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse104" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab165" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab165" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 165) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse105">
                                                <span class="acc-num">10</span>
                                                Laboratorium Basah
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse105" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab166" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab166" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 166) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse106">
                                                <span class="acc-num">11</span>
                                                Laboratorium Bioprospeksi dan Biomaterial kelautan
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse106" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab167" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab167" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 167) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse107">
                                                <span class="acc-num">12</span>
                                                Laboratorium Selam Ilmiah
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse107" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab168" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab168" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 168) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse108">
                                                <span class="acc-num">13</span>
                                                Laboratorium Mikrobiologi Laut
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse108" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab169" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab169" class="table corporex-table corporex-table-02">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Alat</th>
                                                        <th class="text-center">Spesifikasi</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Kondisi Alat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alat->where('id_lab', 169) as $index => $item)
                                                        <tr>
                                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $item->nama_alat }}</td>
                                                            <td>{{ $item->spesifikasi }}</td>
                                                            <td class="text-center">{{ $item->jumlah }}</td>
                                                            <td class="text-center">{{ $item->kondisi_alat }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>



    <footer class="site-footer">
        <div class="footer-blocks">
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchLab157").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab157 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab158").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab158 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab159").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab159 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab160").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab160 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab161").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab161 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab162").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab162 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab163").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab163 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab164").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab164 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab165").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab165 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab166").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab166 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab167").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab167 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab168").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab168 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab169").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab169 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


        });
    </script>
</body>

</html>