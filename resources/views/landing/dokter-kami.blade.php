<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>MediTalk | Dokter Kami</title>
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

    <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- =======================================================
  * Template Name: Vesperr
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('landing') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('landing/img/meditalk_textlogo.png') }}" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('landing') }}">Beranda<br></a></li>
                    <li><a href="{{ route('dokterkami') }}" class="active">Dokter Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Masuk</a><!--direct to login-->

        </div>
    </header>

    <main class="main">

        <div class="page-title" data-aos="fade">
            <div class="container">
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('landing') }}">Beranda</a></li>
                        <li class="current">Dokter Kami</li>
                    </ol>
                </nav>
                <h1>Dokter Kami</h1>
            </div>
        </div>

        <section id="dokterkami-section" class="dokterkami-section section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Dokter di MediTalk</h2>
                <p>Temukan dokter spesialis terbaik sesuai kebutuhan Anda</p>
            </div>

            <div class="container mb-5">
                <div class="row g-3 d-flex justify-content-between">
                    <div class="col-md-3">
                        <select id="filterSpesialis" class="form-select select2">
                            <option value="">Semua Spesialis</option>
                            <option value="Spesialis Anak">Spesialis Anak</option>
                            <option value="Spesialis Jantung">Spesialis Jantung</option>
                            <option value="Spesialis Kulit">Spesialis Kulit</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-icon">
                            <i class="bi bi-search"></i>
                            <input type="text" id="searchInput" class="form-control searchbox-custom"
                                placeholder="Cari dokter">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div id="dokterList" class="row gy-4">
                    @foreach ($dokters as $dokter )
                    <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch justify-content-center">
                      <div class="dokter-member">
                        <div class="dokter-img">
                          <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-fluid" alt="">
                        </div>
                        <div class="dokter-info">
                          <h4>{{ $dokter->nama }}</h4>
                          <span>Spesialis {{ $dokter->spesialis }}</span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <nav>
                        <ul class="pagination" id="pagination">
                            <!-- Pagination items will be generated dynamically -->
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>©<span id="currentYear"></span><a class="px-1 sitename" style="font-weight: 600;"
                        href="{{ route('landing') }}">MediTalk</a>All Rights Reserved.</p>

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
    <script src="{{ asset('landing/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    @php
        $doctorsJson = $dokters->map(function ($dokter) {
            return [
                'name' => $dokter->nama,
                'spesialis' => $dokter->spesialis,
                'img' => asset('storage/' . $dokter->foto),
            ];
        });
    @endphp
    <script>
        const allDoctors = @json($dokters);
    </script>
    <script>
        const dokterList = document.getElementById('dokterList');
        const searchInput = document.getElementById('searchInput');
        const filterSpesialis = document.getElementById('filterSpesialis');
        const pagination = document.getElementById('pagination');

        const doctorsPerPage = 12;
        let currentPage = 1;

        function renderDoctors(filteredDoctors) {
            const start = (currentPage - 1) * doctorsPerPage;
            const end = start + doctorsPerPage;
            const paginatedDoctors = filteredDoctors.slice(start, end);

            dokterList.innerHTML = paginatedDoctors.map(doctor => `
        <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch justify-content-center">
          <div class="dokter-member">
            <div class="dokter-img">
              <img src="${doctor.img}" class="img-fluid" alt="">
            </div>
            <div class="dokter-info">
              <h4>${doctor.name}</h4>
              <span>${doctor.spesialis}</span>
            </div>
          </div>
        </div>
      `).join('');
        }

        function renderPagination(totalDoctors) {
            const totalPages = Math.ceil(totalDoctors / doctorsPerPage);
            pagination.innerHTML = '';

            const maxVisiblePages = 5;
            const pageNumbers = [];

            if (totalPages <= maxVisiblePages) {
                for (let i = 1; i <= totalPages; i++) {
                    pageNumbers.push(i);
                }
            } else {
                pageNumbers.push(1);

                if (currentPage > 3) {
                    pageNumbers.push('...');
                }

                const start = Math.max(2, currentPage - 1);
                const end = Math.min(totalPages - 1, currentPage + 1);

                for (let i = start; i <= end; i++) {
                    pageNumbers.push(i);
                }

                if (currentPage < totalPages - 2) {
                    pageNumbers.push('...');
                }

                pageNumbers.push(totalPages);
            }

            pageNumbers.forEach(p => {
                if (p === '...') {
                    pagination.innerHTML +=
                        `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                } else {
                    pagination.innerHTML += `
        <li class="page-item ${p === currentPage ? 'active' : ''}">
          <a class="page-link" href="#" onclick="goToPage(${p})">${p}</a>
        </li>
      `;
                }
            });
        }


        function filterAndRender() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedSpesialis = $('#filterSpesialis').val();

            const filtered = allDoctors.filter(doc =>
                (doc.name.toLowerCase().includes(searchTerm) || doc.spesialis.toLowerCase().includes(searchTerm)) &&
                (selectedSpesialis === '' || doc.spesialis === selectedSpesialis)
            );

            renderDoctors(filtered);
            renderPagination(filtered.length);
        }

        function goToPage(page) {
            currentPage = page;
            filterAndRender();
        }

        searchInput.addEventListener('input', () => {
            currentPage = 1;
            filterAndRender();
        });
        filterSpesialis.addEventListener('change', () => {
            currentPage = 1;
            filterAndRender();
        });

        filterAndRender();
    </script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#filterSpesialis').select2({
                placeholder: "Pilih spesialis...",
                allowClear: true
            });
        });
        $('#filterSpesialis').on('change', function() {
            currentPage = 1;
            filterAndRender();
        });
    </script>

</body>

</html>
