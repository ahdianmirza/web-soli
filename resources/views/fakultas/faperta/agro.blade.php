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

          <a class="navbar-brand" href="#"><img src="img/ipb_2.png" width="100 px" height="68 px" alt="Logo IPB"></a>

        </div> <!-- .navbar-header -->

        <div class="collapse navbar-collapse navbar-items" id="navbar-items">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/login">Login</a>
            </li>
            <li class="active"><a href="/">Beranda</a></li>
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
          <h2>Agronomi dan Hortikultura</h2>
          <ul class="bread-crumb">
            <li><a href="/">Beranda</a></li>
            <li><a href="/faperta">Fakultas Pertanian</a></li>
            <li><a href="/agro">Departemen Agronomi dan Hortikultura</a></li>
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
              Agronomi dan Hortikultura adalah ilmu yang mempelajari pengelolaan sumberdaya nabati untuk menghasilkan
              produksi maksimum dan berkelanjutan, melalui rekayasa lingkungan dan fisiologi tanaman dengan pemanfaatan
              potensi genetik pada tanaman agronomi, hortikultura, dan sumber bioenergi.
            </p>
            <h3>Laboratorium</h3>
            <div class="panel-group corporex-accordion accordion-style-03 has-num" id="accordion-11">
              <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse45">
                      <span class="acc-num">01</span>
                      Laboratorium Kultur Jaringan 1
                    </a>
                  </h4>
                </div>
                <div id="collapse45" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row search-container">
                      <div class="col-sm-12">
                        <form class="form-inline">
                          <div class="form-group">
                            <input type="text" class="form-control" id="searchLab1" placeholder="Search">
                          </div>
                        </form>
                      </div>
                    </div>
                    <table id="tableLab1" class="table corporex-table corporex-table-02">
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
                        @foreach ($alat->where('id_lab', 1) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse46">
                        <span class="acc-num">02</span>
                        Lab Dik Hortikultura
                      </a>
                    </h4>
                  </div>
                  <div id="collapse46" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab2" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab2" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 2) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse47">
                        <span class="acc-num">03</span>
                        Laboratorium Kultur Jaringan 3
                      </a>
                    </h4>
                  </div>
                  <div id="collapse47" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab3" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab3" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 3) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse48">
                        <span class="acc-num">04</span>
                        Seed center
                      </a>
                    </h4>
                  </div>
                  <div id="collapse48" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab4" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab4" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 4) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse49">
                        <span class="acc-num">05</span>
                        Lab. Penyimpanan dan Pengujian Benih
                      </a>
                    </h4>
                  </div>
                  <div id="collapse49" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab5" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab5" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 5) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse50">
                        <span class="acc-num">06</span>
                        Lab. Biologi dan Biofisik Benih
                      </a>
                    </h4>
                  </div>
                  <div id="collapse50" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab6" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab6" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 6) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse51">
                        <span class="acc-num">07</span>
                        Lab. Fisiologi Benih
                      </a>
                    </h4>
                  </div>
                  <div id="collapse51" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab7" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab7" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 7) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse52">
                        <span class="acc-num">08</span>
                        Lab. Mikroteknik
                      </a>
                    </h4>
                  </div>
                  <div id="collapse52" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab8" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab8" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 8) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse53">
                        <span class="acc-num">09</span>
                        Lab. Ekofisiologi Tanaman
                      </a>
                    </h4>
                  </div>
                  <div id="collapse53" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab9" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab9" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 9) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse54">
                        <span class="acc-num">10</span>
                        Lab Pascapanen dan biomassa
                      </a>
                    </h4>
                  </div>
                  <div id="collapse54" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab10" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab10" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 10) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse55">
                        <span class="acc-num">11</span>
                        Lab PMB 1
                      </a>
                    </h4>
                  </div>
                  <div id="collapse55" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab11" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab11" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 11) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse56">
                        <span class="acc-num">12</span>
                        Lab PMB 2
                      </a>
                    </h4>
                  </div>
                  <div id="collapse56" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab12" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab12" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 12) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse57">
                        <span class="acc-num">13</span>
                        Lab Benih Basah-leuwikopo
                      </a>
                    </h4>
                  </div>
                  <div id="collapse57" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab13" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab13" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 13) as $index => $item)
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
                  <div class="panel-heading ">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse58">
                        <span class="acc-num">14</span>
                        Lab Benih Kering-leuwikopo
                      </a>
                    </h4>
                  </div>
                  <div id="collapse58" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab14" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab14" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 14) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse59">
                        <span class="acc-num">15</span>
                        Lab. Tanaman Perkebunan
                      </a>
                    </h4>
                  </div>
                  <div id="collapse59" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab15" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab15" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 15) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse60">
                        <span class="acc-num">16</span>
                        Lab. Ekotoksikologi, Limbah, dan Agen Hayati
                      </a>
                    </h4>
                  </div>
                  <div id="collapse60" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab18" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab18" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 18) as $index => $item)
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
                      <a data-toggle="collapse" href="#collapse61">
                        <span class="acc-num">17</span>
                        Lab Kuljar 2
                      </a>
                    </h4>
                  </div>
                  <div id="collapse61" class="panel-collapse collapse">
                    <div class="panel-body">
                      <p>

                      </p>
                      <div class="row search-container">
                        <div class="col-sm-12">
                          <form class="form-inline">
                            <div class="form-group">
                              <input type="text" class="form-control" id="searchLab19" placeholder="Search">
                            </div>
                          </form>
                        </div>
                      </div>
                      <table id="tableLab19" class="table corporex-table corporex-table-02">
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
                          @foreach ($alat->where('id_lab', 19) as $index => $item)
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
      $("#searchLab1").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab1 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab2 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab2 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab3").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab3 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab4").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab4 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab5").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab5 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab6").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab6 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab7").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab7 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab8").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab8 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab9").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab9 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab10").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab10 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab11").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab11 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab12").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab12 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab13").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab13 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab14").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab14 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab15").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab15 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab18").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab18 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#searchLab19").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableLab19 tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>