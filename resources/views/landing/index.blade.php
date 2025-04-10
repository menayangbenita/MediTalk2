<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Meditalk</title>
    <meta name="description"
        content="MediTalk adalah layanan konsultasi dokter online yang memudahkan pasien berkonsultasi dan mengakses rekam medis secara digital.">
    <meta name="keywords"
        content="MediTalk, konsultasi dokter online, rekam medis online, layanan kesehatan online, rumah sakit">
    <meta property="og:title" content="MediTalk">
    <meta property="og:description" content="Konsultasi online 24/7 dengan dokter profesional">
    <meta property="og:image" content="{{ asset('images/Logo.svg') }}">
    <meta property="og:url" content="https://MediTalk.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('images/Logo.svg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Vesperr
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('landing/img/meditalk_textlogo.png') }}" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Beranda<br></a></li>
                    <li><a href="{{ route('dokterkami') }}">Dokter Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Masuk</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade">Layanan Konsultasi Dokter Online</h1>
                        <p class="fs-5" data-aos="fade" data-aos-delay="200">MediTalk hadir untuk memudahkan pasien
                            dalam berkonsultasi dengan dokter secara online, dan
                            akses rekam medis secara online.</p>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn-get-started" data-aos="fade-up">Mulai
                                Konsultasi</a><!--direct to login-->
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade">
                        <img src="{{ asset('landing/img/hero-img-a.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Mengapa MediTalk?</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="content col-xl-5 icon-box position-relative text-center" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="{{ asset('landing/img/whymeditalk.jpg') }}" class="img-fluid me-5 me-sm-0 rounded"
                            alt="">
                    </div>

                    <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6 icon-box position-relative text-center">
                                <i class="bi bi-clock-history"></i>
                                <h4><span class="stretched-link">Durasi chat hingga 60 menit</span></h4>
                                <p>Maksimalkan sesi konsultasi dengan dokter Anda</p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative text-center">
                                <i class="bi bi-journal-medical"></i>
                                <h4><span class="stretched-link">Lihat riwayat rekam medis</span></h4>
                                <p>Akses hasil rekam medis elektronik Anda kapan saja dan di mana saja</p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative text-center">
                                <i class="bi bi-lungs "></i>
                                <h4><span class="stretched-link">Konsultasikan keluhan Anda</span></h4>
                                <p>Temukan dokter spesialis yang sesuai dan mulai berkonsultasi mengenai keluhan Anda
                                </p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative text-center">
                                <i class="bi bi-credit-card"></i>
                                <h4><span class="stretched-link">Pembayaran yang mudah</span></h4>
                                <p>MediTalk terintegrasi dengan Midtrans, memudahkan Anda melakukan pembayaran digital
                                </p>
                            </div><!-- Icon-Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Dokter Kami</h2>
                <p>Tenaga kesehatan berpengalaman yang siap membantu Anda.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-12 col-sm-3 col-md-3 d-flex align-items-stretch justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('landing/img/team/team-1.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>dr. Kaeya Alberich, Sp.A (K)</h4>
                                <span>Spesialis Anak</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-3 col-md-3 d-flex align-items-stretch justify-content-center"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('landing/img/team/team-2.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>dr. Kaeya Alberich, Sp.A (K)</h4>
                                <span>Spesialis Anak</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-3 col-md-3 d-flex align-items-stretch justify-content-center"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('landing/img/team/team-3.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>dr. Kaeya Alberich, Sp.A (K)</h4>
                                <span>Spesialis Anak</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-3 col-md-3 d-flex align-items-stretch justify-content-center"
                        data-aos="fade-up" data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('landing/img/team/team-4.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="member-info">
                                <h4>dr. Kaeya Alberich, Sp.A (K)</h4>
                                <span>Spesialis Anak</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-end mt-5" data-aos="fade-up" data-aos-delay="400">
                    <a class="btn-moredokter" href="{{ route('dokterkami') }}">Lebih Banyak <i
                            class="bi bi-arrow-right"></i></a>
                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>4 Langkah Berkonsultasi</h2>
                <p>Ingin konsultasi dengan dokter secara praktis dan tanpa antre? Ikuti langkah-langkah berikut!</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <i class="bi bi-box-arrow-in-right fs-2"></i>
                            <h4><span class="stretched-link">Masuk</span></h4>
                            <p>Masuk ke akun MediTalk Anda. Jika belum punya, daftar sekarang hanya dalam hitungan
                                menit!</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <i class="bi bi-person fs-2"></i>
                            <h4><span class="stretched-link">Cari Dokter</span></h4>
                            <p>Gunakan fitur pencarian untuk menemukan dokter spesialis yang tepat untuk Anda. Lihat
                                profil dan rating
                                mereka.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <i class="bi bi-wallet2 fs-2"></i>
                            <h4><span class="stretched-link">Bayar</span></h4>
                            <p>Lakukan pembayaran dengan mudah menggunakan berbagai metode yang tersedia, seperti
                                e-wallet, transfer
                                bank, atau kartu kredit.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <i class="bi bi-phone fs-2"></i>
                            <h4><span class="stretched-link">Konsultasi</span></h4>
                            <p>Setelah pembayaran berhasil, langsung mulai konsultasi dengan dokter pilihan Anda melalui
                                chat!</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Services Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>©<span id="currentYear"></span><a class="px-1 sitename" style="font-weight: 600;"
                        href="/">MediTalk</a>All Rights Reserved.</p>

                <script>
                    document.getElementById('currentYear').textContent = new Date().getFullYear();
                </script>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url]
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
          href="https://themewagon.com" target="_blank">ThemeWagon</a>-->
                </div>
            </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/aos/aos.jsa') }}"></script>
    <script src="{{ asset('landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>
