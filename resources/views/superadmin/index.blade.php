@extends('layout.superadmin')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Fakultas:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahFakultas}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 1 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Departemen:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahDepartemen}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 2 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Lab:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahLab}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 3 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Alat:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahAlat}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 3 -->

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah User:</h5>
                        <p class="card-text text-center" style="font-size: 36px; font-style: bold;">
                            {{$jumlahUser}}
                        </p>
                    </div>
                </div>
            </div><!-- End Card 3 -->
        </div>
    </section>

</main>
@endsection