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
                    <h2>Departemen Teknologi Industri Pertanian</h2>
                    <ul class="bread-crumb">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/fateta">Fakultas Teknologi Pertanian</a></li>
                        <li><a href="/industripertanian">Departemen Teknologi Industri Pertanian</a></li>
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
                        <h3>Visi</h3>
                        <p>
                            --
                        </p>
                        <h3>Misi</h3>
                        <ol class="item-list">
                            <li>-</li>
                        </ol>
                        <h3>Laboratorium</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group corporex-accordion accordion-style-03 has-num" id="accordion-11">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse186">
                                                    <span class="acc-num">01</span>
                                                    Lab.instrumen 1
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse186" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row search-container">
                                                    <div class="col-sm-12">
                                                        <form class="form-inline">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="searchLab264" placeholder="Search">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <table id="tableLab264" class="table corporex-table corporex-table-02">
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
                                                        @foreach ($alat->where('id_lab', 264) as $index => $item)
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
                                                    <a data-toggle="collapse" href="#collapse187">
                                                        <span class="acc-num">02</span>
                                                        Lab.instrumen 2
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse187" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>

                                                    </p>
                                                    <div class="row search-container">
                                                        <div class="col-sm-12">
                                                            <form class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="searchLab265" placeholder="Search">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table id="tableLab265" class="table corporex-table corporex-table-02">
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
                                                            @foreach ($alat->where('id_lab', 265) as $index => $item)
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
                                                    <a data-toggle="collapse" href="#collapse188">
                                                        <span class="acc-num">03</span>
                                                        Lab.wastu
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse188" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>

                                                    </p>
                                                    <div class="row search-container">
                                                        <div class="col-sm-12">
                                                            <form class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="searchLab266" placeholder="Search">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table id="tableLab266" class="table corporex-table corporex-table-02">
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
                                                            @foreach ($alat->where('id_lab', 266) as $index => $item)
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
                                                    <a data-toggle="collapse" href="#collapse189">
                                                        <span class="acc-num">04</span>
                                                        Lab.TML
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse189" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>

                                                    </p>
                                                    <div class="row search-container">
                                                        <div class="col-sm-12">
                                                            <form class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="searchLab267" placeholder="Search">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table id="tableLab267" class="table corporex-table corporex-table-02">
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
                                                            @foreach ($alat->where('id_lab', 267) as $index => $item)
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
                                                    <a data-toggle="collapse" href="#collapse190">
                                                        <span class="acc-num">05</span>
                                                        F-Technopark
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse190" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>

                                                    </p>
                                                    <div class="row search-container">
                                                        <div class="col-sm-12">
                                                            <form class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="searchLab268" placeholder="Search">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table id="tableLab268" class="table corporex-table corporex-table-02">
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
                                                            @foreach ($alat->where('id_lab', 268) as $index => $item)
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
                </div>
            </div>
    </section>



    <footer class="site-footer">
        <div class="footer-blocks">
        </div> <!-- .footer-blocks -->
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
            $("#searchLab264").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab264 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab265").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab265 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab266").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab266 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab267").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab267 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#searchLab268").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableLab268 tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

        });
    </script>
</body>

</html>