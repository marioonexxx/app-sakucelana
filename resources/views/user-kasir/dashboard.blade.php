@extends('layouts.navbar')
@section('title', 'Dashboard Kasir')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Saku Celana - Dashboard Kasir</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Kasir</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid default-dashboard">
            <div class="row widget-grid">
                <div class="col-xxl-12 col-sm-6 box-col-6">
                    <div class="card profile-box">
                        <div class="card-body">
                            <div class="d-flex media-wrapper justify-content-between">
                                <div class="flex-grow-1">
                                    <div class="greeting-user">
                                        <h2 class="f-w-600">Welcome : {{ Auth::user()->name }}</h2>
                                        <p>Membuat laporan keuangan menjadi lebih mudah dengan Aplikasi SAKU CELANA!</p>
                                        <div class="whatsnew-btn"><a class="btn btn-outline-white" href="">View
                                                Profile</a></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="clockbox"><svg id="clock" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 600 600">
                                            <g id="face">
                                                <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                                <path class="hour-marks"
                                                    d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6">
                                                </path>
                                                <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                            </g>
                                            <g id="hour">
                                                <path class="hour-hand" d="M300.5 298V142"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="minute">
                                                <path class="minute-hand" d="M300.5 298V67"> </path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                            </g>
                                            <g id="second">
                                                <path class="second-hand" d="M300.5 350V55"></path>
                                                <circle class="sizing-box" cx="300" cy="300" r="253.9">
                                                </circle>
                                            </g>
                                        </svg></div>
                                    <div class="badge f-10 p-0" id="txt"></div>
                                </div>
                            </div>
                            <div class="cartoon"><img class="img-fluid"
                                    src="{{ asset('cuba/assets/images/dashboard/cartoon.svg') }}"
                                    alt="vector women with leptop">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 box-col-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="card compare-order">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <div class="compare-icon shadow-primary"><i data-feather="shopping-bag"></i></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0"> <span class="f-w-500 c-o-light">TOTAL PRODUK</span>
                                    <h4 class="mb-2"><span class="counter"
                                            data-target="7000000">{{ $totalProduk }}</span></h4>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="58"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="card compare-order">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <div class="compare-icon shadow-primary"><i data-feather="shopping-cart"></i></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0"> <span class="f-w-500 c-o-light">TOTAL TRANSAKSI</span>
                                    <h4 class="mb-2"><span class="counter" data-target="1398700">{{ $totalTransaksi }}</span></h4>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="58"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: 58%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card compare-order">
                                <div class="card-header card-no-border">
                                    <div class="header-top">
                                        <div class="compare-icon shadow-primary"><i data-feather="shopping-bag"></i></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0"> <span class="f-w-500 c-o-light">TOTAL PENJUALAN</span>
                                    <h4 class="mb-2">Rp <span class="counter"
                                            data-target="760000">{{ $totalPenjualan }}</span></h4>
                                    <div class="progress" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-warning" style="width: 58%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- Container-fluid Ends-->
    </div>
@endsection
