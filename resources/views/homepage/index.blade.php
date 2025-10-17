<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SakuCelana - Aplikasi Laporan Keuangan UMKM Ambon</title>
    <meta name="description"
        content="SakuCelana adalah aplikasi laporan keuangan yang membantu UMKM di Kota Ambon meningkatkan tata kelola usaha, pencatatan transaksi, hingga laporan neraca dan laba rugi.">
    <meta name="keywords"
        content="SakuCelana, aplikasi keuangan UMKM, laporan keuangan UMKM Ambon, pencatatan transaksi, tata kelola usaha, neraca, jurnal, buku besar">


    <!-- Favicons -->
    <link href="{{ asset('corebiz/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('corebiz/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('corebiz/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('corebiz/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('corebiz/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('corebiz/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('corebiz/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('corebiz/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: CoreBiz
  * Template URL: https://bootstrapmade.com/corebiz-bootstrap-business-template/
  * Updated: Aug 30 2025 with Bootstrap v5.3.8
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center dark-background">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">contact@example.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="{{ asset('icon.png') }}" alt="Aplikasi Saku Celana">
                    <h1 class="sitename">Saku Celana</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href={{ route('login') }}>Login</a></li>
                        {{-- <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#team">Team</a></li>
                        <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Dropdown 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Dropdown 1</a></li>
                                        <li><a href="#">Deep Dropdown 2</a></li>
                                        <li><a href="#">Deep Dropdown 3</a></li>
                                        <li><a href="#">Deep Dropdown 4</a></li>
                                        <li><a href="#">Deep Dropdown 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Dropdown 2</a></li>
                                <li><a href="#">Dropdown 3</a></li>
                                <li><a href="#">Dropdown 4</a></li>
                            </ul>
                        </li>
                        <li><a href="#contact">Contact</a></li> --}}
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="hero-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="content">
                                <h1>SAKU CELANA</h1>
                                <p>Meningkatkan tata kelola keuangan UMKM di Kota
                                    Ambon.</p>
                                <div class="cta-group">
                                    <a href="#about" class="btn-primary">Start Your Journey</a>
                                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                        class="btn-secondary glightbox">
                                        <i class="bi bi-play-circle"></i>
                                        <span>Watch Our Story</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="hero-image">
                                <img src="{{ asset('corebiz/assets/img/accountant/accountant2.png') }}"
                                    alt="Corporate Business" class="img-fluid">
                                <div class="floating-card" data-aos="fade-up" data-aos-delay="300">
                                    <div class="card-content">
                                        <div class="metric">
                                            <span class="number">10+</span>
                                            <span class="label">Sukses Membantu UMKM!</span>
                                        </div>
                                        <div class="metric">
                                            <span class="number">100%</span>
                                            <span class="label">UMKM Pasti Puas!</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-features">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-graph-up"></i>
                                    </div>
                                    <h4>Pertumbuhan Bisnis</h4>
                                    <p>Kembangkan usahamu lebih cepat dengan pengelolaan keuangan yang rapi dan laporan
                                        yang jelas.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-lightbulb"></i>
                                    </div>
                                    <h4>Fokus Inovasi</h4>
                                    <p>Ubah tantangan keuangan jadi peluang lewat pencatatan yang mudah, transparan, dan
                                        otomatis.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <h4>Tim Ahli</h4>
                                    <p>Dikembangkan oleh praktisi yang paham kebutuhan UMKM, siap mendukung keberhasilan
                                        bisnismu.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-item">
                                    <div class="icon">
                                        <i class="bi bi-award"></i>
                                    </div>
                                    <h4>Hasil Terbukti</h4>
                                    <p>Catatan keuangan lebih tertata, laporan lebih akurat, dan bisnis makin siap
                                        berkembang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team Pengembang Aplikasi Saku Celana</h2>
                <p>Our Hardworking Team</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-card">
                            <div class="member-image-wrapper">
                                <img src="{{ asset('corebiz/assets/img/person/Christina Sososutiksno.webp') }}" class="img-fluid" alt="Team Member">
                            </div>
                            <div class="member-content">
                                <h4 class="member-name">Prof. Dr. Christina Sososutiksno, S.E., M.Si, Ak, CA</h4>
                                <span class="member-role">Guru Besar Bidang Akuntansi Manajemen/Keprilakuan - Dosen Fakultas Ekonomi dan Bisnis</span>
                                <p class="member-bio">Universitas Pattimura</p>
                                <div class="member-socials">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-card">
                            <div class="member-image-wrapper">
                                <img src="{{ asset('corebiz/assets/img/person/Marion Erwin Dien.jpg') }}" class="img-fluid" alt="Team Member">
                            </div>
                            <div class="member-content">
                                <h4 class="member-name">Marion Erwin Dien, S.Kom., M.Cs</h4>
                                <span class="member-role">System Design/Analyst </span>
                                <p class="member-bio">Dosen Program Studi Teknik Informatika Politeknik Negeri Ambon.</p>
                                <div class="member-socials">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                    <a href="#"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-card">
                            <div class="member-image-wrapper">
                                <img src="{{ asset('corebiz/assets/img/person/Pranatalindo Simanjutak.jpg') }}" class="img-fluid" alt="Team Member">
                            </div>
                            <div class="member-content">
                                <h4 class="member-name">Pranatalindo Simanjutak</h4>
                                <span class="member-role">Dosen Ilmu Ekonomi Fakultas Ekonomi dan Bisnis</span>
                                <p class="member-bio">Universitas Pattimura.</p>
                                <div class="member-socials">
                                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->


    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">SAKU CELANA</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Fakultas Ekonomi dan Bisnis</p>
                        <p>UNIVERSITAS PATTIMURA AMBON</p>

                    </div>
                </div>

                {{-- <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links d-flex">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div> --}}

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Tim Penelitian BIMA 2025 - Universitas
                    Pattimura</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('corebiz/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('corebiz/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('corebiz/assets/js/main.js') }}"></script>

</body>

</html>
