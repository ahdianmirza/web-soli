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
                    <h2>Departemen Manajemen Sumberdaya Perairan</h2>
                    <ul class="bread-crumb">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/fpik">Fakultas Perikanan dan Ilmu Kelautan</a></li>
                        <li><a href="/sumberdayaperairan">Departemen Manajemen Sumberdaya Perairan</a></li>
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
                                        <a data-toggle="collapse" href="#collapse81">
                                            <span class="acc-num">01</span>
                                            LAB. Ekobilogi BIMA 1 (3.206)
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse81" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row search-container">
                                            <div class="col-sm-12">
                                                <form class="form-inline">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="searchLab126" placeholder="Search">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <table id="tableLab126" class="table corporex-table corporex-table-02">
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
                                                @foreach ($alat->where('id_lab', 126) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse82">
                                                <span class="acc-num">02</span>
                                                Lab. Ekobiologi 2 (3.201)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse82" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab130" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab130" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 130) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse84">
                                                <span class="acc-num">03</span>
                                                Laboratorium DIR. 14.108
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse84" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab132" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab132" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 132) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse85">
                                                <span class="acc-num">04</span>
                                                Laboratorium DIR. 14.101
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse85" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab133" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab133" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 133) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse87">
                                                <span class="acc-num">05</span>
                                                Laboratorium DIR. 14.204
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse87" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab135" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab135" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 135) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse88">
                                                <span class="acc-num">06</span>
                                                Laboratorium DIR. 14.107
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse88" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab136" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab136" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 136) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse89">
                                                <span class="acc-num">07</span>
                                                Lab. BIMI I Proling (10.208)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse89" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab137" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab137" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 137) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse90">
                                                <span class="acc-num">08</span>
                                                LAB. PROLING (14.302)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse90" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab141" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab141" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 141) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse90">
                                                <span class="acc-num">09</span>
                                                LAB. PROLING DIR. 14.109
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse90" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab139" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab139" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 139) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse91">
                                                <span class="acc-num">10</span>
                                                LAB. PROLING Teknisi (14.104)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse91" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab142" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab142" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 142) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse92">
                                                <span class="acc-num">11</span>
                                                LAB. MOLEKULER MSPi (10.404)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse92" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab149" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab149" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 149) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse93">
                                                <span class="acc-num">12</span>
                                                Lab. BIOPER - MSPi (7,403)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse93" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab150" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab150" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 150) as $index => $item)
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
                                            <a data-toggle="collapse" href="#collapse94">
                                                <span class="acc-num">13</span>
                                                Ruang Lab. MOSI MSPi (3,401)
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse94" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>

                                            </p>
                                            <div class="row search-container">
                                                <div class="col-sm-12">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="searchLab151" placeholder="Search">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table id="tableLab151" class="table corporex-table corporex-table-02">
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
                                                    @foreach ($alat->where('id_lab', 151) as $index => $item)
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
            $("#searchLab126").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab126 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab130").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab130 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab132").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab132 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab133").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab133 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab135").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab135 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab136").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab136 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab137").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab137 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab141").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab141 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab139").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab139 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab142").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab142 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab149").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab149 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab150").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab150 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab151").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab151 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


        });
    </script>
</body>

</html>