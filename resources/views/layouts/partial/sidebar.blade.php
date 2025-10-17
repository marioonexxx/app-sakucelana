<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa-solid fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ asset('cuba/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                {{-- ROLE INVENTARIS --}}
                @if (Auth::check() && Auth::user()->role == '4')
                    <div id="sidebar-menu">

                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i
                                        class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                        </use>
                                    </svg><span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('produk.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-to-do') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-to-do') }}">
                                        </use>
                                    </svg><span>Manajemen Produk</span>
                                </a>
                            </li>

                            {{-- <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i><a
                                    class="sidebar-link sidebar-title" href="#">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-sitemap') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-sitemap') }}">
                                        </use>
                                    </svg><span>Manajemen Produk</span></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="#">Logo dan Nama
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Slide Show
                                        </a>
                                    </li>

                                </ul>
                            </li>  --}}



                        </ul>

                    </div>
                @endif

                {{-- ROLE KASIR --}}
                @if (Auth::check() && Auth::user()->role == '1')
                    <div id="sidebar-menu">

                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i
                                        class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                        </use>
                                    </svg><span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('kasir.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-price') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-price') }}">
                                        </use>
                                    </svg><span>Kasir</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('transaksi.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-knowledgebase') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-knowledgebase') }}">
                                        </use>
                                    </svg><span>Data Transaksi</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('kasir.showprofil') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                        </use>
                                    </svg><span>Akun</span>
                                </a>
                            </li>
                           

                        </ul>

                    </div>
                @endif

                  {{-- ROLE KEUANGAN --}}
                @if (Auth::check() && Auth::user()->role == '3')
                    <div id="sidebar-menu">

                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i
                                        class="fa-solid fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li class="pin-title sidebar-main-title">
                                <div>
                                    <h6>Pinned</h6>
                                </div>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-home') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-home') }}">
                                        </use>
                                    </svg><span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('koderekening.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-to-do') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-to-do') }}">
                                        </use>
                                    </svg><span>Kode Rekening</span>
                                </a>
                            </li>
                            <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('biaya-operasional.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-price') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-price') }}">
                                        </use>
                                    </svg><span>Biaya Operasional</span>
                                </a>
                            </li>
                             <li class="sidebar-list"><i class="fa-solid fa-thumbtack"></i>
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('keuangan.showprofil') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#stroke-user') }}">
                                        </use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#fill-user') }}">
                                        </use>
                                    </svg><span>Akun</span>
                                </a>
                            </li>


                        </ul>

                    </div>
                @endif
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->
