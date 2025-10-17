<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('cuba/assets/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/prism.css') }}">

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('cuba/assets/css/color-1.css') }}" media="screen">

    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/responsive.css') }}">

</head>


<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Anything Here..." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span></div><i class="close-search"
                                    data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-12 col-sm-auto p-0 text-center text-sm-start">
                    <div class="logo-wrapper">
                        <a href="#">
                            <img class="img-fluid for-light w-100" style="max-width: 180px;"
                                src="{{ asset('cuba/assets/images/logo/logo.png') }}" alt="">
                            <img class="img-fluid for-dark w-100" style="max-width: 180px;"
                                src="{{ asset('cuba/assets/images/logo/logo_dark.png') }}" alt="">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    </div>
                </div>

                <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">

                </div>
                <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">

                        <li class="fullscreen-body"> <span>
                                <svg id="maximize-screen">
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#full-screen') }}"></use>
                                </svg></span></li>


                        <li>
                            <div class="mode">
                                <svg>
                                    <use href="{{ asset('cuba/assets/svg/icon-sprite.svg#moon') }}"></use>
                                </svg>
                            </div>
                        </li>

                        <li class="profile-nav onhover-dropdown pe-0 py-0">
                            <div class="d-flex profile-media">
                                <img class="b-r-10"
                                    src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('cuba/assets/images/dashboard/profile.png') }}"
                                    alt="Foto Profil" style="width: 40px; height: 40px; object-fit: cover;">

                                <div class="flex-grow-1"><span>{{ Auth::user()->name }}</span>
                                    @php
                                        $roles = [
                                            0 => 'Administrator',
                                            1 => 'Kasir',
                                            2 => 'Manajer',
                                            3 => 'Bag. Keuangan',
                                            4 => 'Bag. Inventaris',
                                        ];

                                        $roleName = $roles[Auth::user()->role] ?? 'Tidak Diketahui';
                                    @endphp

                                    <p class="mb-0">
                                        {{ $roleName }}
                                        <i class="middle fa-solid fa-angle-down"></i>
                                    </p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                {{-- <li><a href="../template/sign-up.html"><i data-feather="user"></i><span>Account
                                        </span></a></li>
                                <li><a href="../template/mail-box.html"><i
                                            data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="../template/task.html"><i
                                            data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="../template/add-user.html"><i
                                            data-feather="settings"></i><span>Settings</span></a></li> --}}
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <i data-feather="log-in"></i> <span>LOG OUT</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">NAMA</div>
            </div>
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper horizontal-menu">
            @include('layouts.partial.sidebar')
            @yield('content')
            @include('layouts.partial.footer')
        </div>
    </div>
    <!-- latest jquery-->
    {{-- <script src="{{ asset('cuba/assets/js/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap js-->
    <script src="{{ asset('cuba/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('cuba/assets/js/scrollbar/simplebar.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('cuba/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('cuba/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('cuba/assets/js/script.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/script1.js') }}"></script>
    <script src="{{ asset('cuba/assets/js/theme-customizer/customizer.js') }}"></script>

    {{-- CK EDITOR --}}
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @stack('scripts')
    @yield('script')
</body>

</html>
