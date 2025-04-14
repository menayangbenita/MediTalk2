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
                            <option value="Anak">Spesialis Anak (Sp.A)</option>
                            <option value="Bedah">Spesialis Bedah (Sp.B)</option>
                            <option value="Bedah Anak">Spesialis Bedah Anak (Sp.BA)</option>
                            <option value="Bedah Plastik">Spesialis Bedah Plastik, Rekonstruksi & Estetik
                                (Sp.BP-RE)</option>
                            <option value="Bedah Orthopedi">Spesialis Bedah Orthopedi & Traumatologi (Sp.OT)
                            </option>
                            <option value="Bedah Saraf">Spesialis Bedah Saraf (Sp.BS)</option>
                            <option value="Bedah Urologi">Spesialis Urologi (Sp.U)</option>
                            <option value="Bedah Kardiovaskular">Spesialis Bedah Toraks, Kardiak & Vaskular
                                (Sp.BTKV)</option>
                            <option value="Jantung">Spesialis Jantung & Pembuluh Darah (Sp.JP)</option>
                            <option value="THT">Spesialis Telinga, Hidung, Tenggorokan, Bedah Kepala &
                                Leher (Sp.THT-KL)</option>
                            <option value="Penyakit Dalam">Spesialis Penyakit Dalam (Sp.PD)</option>
                            <option value="Paru">Spesialis Pulmonologi & Kedokteran Respirasi (Sp.P)
                            </option>
                            <option value="Saraf">Spesialis Neurologi (Sp.N)</option>
                            <option value="Mata">Spesialis Mata (Sp.M)</option>
                            <option value="Obgyn">Spesialis Obstetri & Ginekologi (Sp.OG)</option>
                            <option value="Kulit dan Kelamin">Spesialis Kulit & Kelamin (Sp.KK)</option>
                            <option value="Anestesi">Spesialis Anestesiologi & Terapi Intensif (Sp.An)
                            </option>
                            <option value="Kedokteran Jiwa">Spesialis Kedokteran Jiwa / Psikiater (Sp.KJ)
                            </option>
                            <option value="Gizi Klinik">Spesialis Gizi Klinik (Sp.GK)</option>
                            <option value="Patologi Klinik">Spesialis Patologi Klinik (Sp.PK)</option>
                            <option value="Patologi Anatomi">Spesialis Patologi Anatomi (Sp.PA)</option>
                            <option value="Radiologi">Spesialis Radiologi (Sp.Rad)</option>
                            <option value="Forensik">Spesialis Forensik & Medikolegal (Sp.F)</option>
                            <option value="Rehabilitasi Medis">Spesialis Kedokteran Fisik & Rehabilitasi
                                (Sp.KFR)</option>
                            <option value="Kedokteran Olahraga">Spesialis Kedokteran Olahraga (Sp.KO)
                            </option>
                            <option value="Gigi">Spesialis Kedokteran Gigi (Sp.KG)</option>
                            <option value="Gigi Anak">Spesialis Kedokteran Gigi Anak (Sp.KGA)</option>
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
                    @foreach ($dokters as $dokter)
                        <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch justify-content-center">
                            <div class="dokter-member">
                                <div class="dokter-img">
                                    <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-fluid"
                                        alt="">
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
        const allDoctors = @json($doctorsJson);
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
              <span>Spesialis ${doctor.spesialis}</span>
            </div>
          </div>
        </div>
      `).join('');
        }

        function renderPagination(filteredDoctors) {
        const totalPages = Math.ceil(filteredDoctors.length / doctorsPerPage);
        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === currentPage) li.classList.add('active');

            const a = document.createElement('a');
            a.classList.add('page-link');
            a.href = '#';
            a.textContent = i;

            a.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = i;
                updateDoctorsList();
            });

            li.appendChild(a);
            pagination.appendChild(li);
        }
    }

    function updateDoctorsList() {
        const searchQuery = searchInput.value.toLowerCase();
        const selectedSpecialist = filterSpesialis.value;

        const filteredDoctors = allDoctors.filter(doctor => {
            const matchesName = doctor.name.toLowerCase().includes(searchQuery);
            const matchesSpecialist = selectedSpecialist === "" || doctor.spesialis === selectedSpecialist;
            return matchesName && matchesSpecialist;
        });

        renderDoctors(filteredDoctors);
        renderPagination(filteredDoctors);
    }

    // Event listeners
    searchInput.addEventListener('input', () => {
        currentPage = 1;
        updateDoctorsList();
    });

    filterSpesialis.addEventListener('change', () => {
        currentPage = 1;
        updateDoctorsList();
    });

    // Initial render
    document.addEventListener('DOMContentLoaded', () => {
        $('.select2').select2();
        updateDoctorsList();
    });
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
        $('#filterSpesialis').on('change', function () {
        currentPage = 1;
        updateDoctorsList();
        });
    </script>

</body>

</html>
