<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website yang melayani konsultasi dokter online.">
    <meta name="keywords" content="konsultasi, konsultasi online, dokter, kesehatan">
    <meta name="author" content="Kelompok 4 RPL C 2024/2025">
    <meta name="robots" content="noindex, nofollow">
    <meta property="og:title" content="MediTalk">
    <meta property="og:description" content="Konsultasi online 24/7 dengan dokter profesional">
    <meta property="og:image" content="{{ asset('images/Logo.svg') }}">
    <meta property="og:url" content="https://MediTalk.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/Logo.svg') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" />

    <title>@yield('title', 'MediTalk')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
        .last-chat {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 215px;
        }
    </style>
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="kt_app_header" class="app-header">
                <div class="app-container container-fluid d-flex align-items-stretch flex-stack"
                    id="kt_app_header_container">
                    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </div>
                        <a href="{{ route('dashboard.dokter') }}">
                            <img alt="Logo" src="{{ asset('images/Logo-text.svg') }}" class="h-30px" />
                        </a>

                    </div>
                </div>
            </div>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex align-items-center px-8"
                        id="kt_app_sidebar_logo">
                        <a href="{{ route('dashboard.dokter') }}">
                            <img alt="Logo" src="{{ asset('images/Logo-text.svg') }}"
                                class="h-35px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ asset('images/Logo-text.svg') }}"
                                class="h-25px h-lg-25px theme-dark-show" />
                        </a>
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_aside_mobile_toggle">
                                <i class="ki-outline ki-abstract-14 fs-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <div id="kt_app_sidebar_menu_wrapper"
                            class="app-sidebar-wrapper hover-scroll-overlay-y my-5 mx-3" data-kt-scroll="true"
                            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
                            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-1"
                                id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('dashboard.dokter') ? 'active' : '' }}" href="{{ route('dashboard.dokter') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-home fs-2"></i>
                                        </span>
                                        <span class="menu-title">Beranda</span>
                                    </a>
                                </div>
                                <div class="menu-item pt-5">
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">REKAM MEDIS PASIEN</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('dokter.rekam-medis') ? 'active' : '' }}" href="{{ route('dokter.rekam-medis') }}">
                                        <span class="menu-icon">
                                            <i class="bi bi-file-earmark-medical fs-2"></i>
                                        </span>
                                        <span class="menu-title">Rekam Medis Pasien</span>
                                    </a>
                                </div>
                                <div class="menu-item pt-5">
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">KONSULTASI</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('dokter.chat') ? 'active' : '' }}" href="{{ route('dokter.chat') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-messages fs-2"></i>
                                        </span>
                                        <span class="menu-title">Konsultasi</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ request()->routeIs('dokter.penarikan.index') ? 'active' : '' }}" href="{{ route('dokter.penarikan.index') }}">
                                        <span class="menu-icon">
                                            <i class="bi bi-cash-stack fs-2"></i>
                                        </span>
                                        <span class="menu-title">Penarikan Dana</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-link">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"
                                                id="switchAvailConsult"
                                                data-id="{{ $dokter->id }}"
                                                {{ $dokter->status == 'aktif' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="switchAvailConsult" style="pointer-events: none;">
                                                <span class="menu-title" id="statusText">
                                                    {{ $dokter->status == 'aktif' ? 'Tersedia' : 'Tidak Tersedia' }}
                                                </span>
                                            </label>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-sidebar-footer d-flex align-items-center px-8 pb-10" id="kt_app_sidebar_footer">
                        <div class="">
                            <div class="d-flex align-items-center"
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true"
                                data-kt-menu-placement="top-start">
                                <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px me-4">
                                    <img src="{{ asset('storage/' . Auth::user()->dokter->foto) }}" alt="image" />
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">Selamat datang,
                                    </div>
                                    <a href="{{ route('dokter.profil.show') }}"
                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->name }}</a>
                                </div>
                            </div>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <div class="symbol symbol-50px me-8">
                                            <img alt="Logo" src="{{ asset('storage/' . Auth::user()->dokter->foto) }}" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5">
                                    <a href="{{ route('dokter.profil.show') }}" class="menu-link px-5">Profil
                                        Saya</a>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">Mode
                                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                            </span></span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-night-day fs-2"></i>
                                                </span>
                                                <span class="menu-title">Terang</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-moon fs-2"></i>
                                                </span>
                                                <span class="menu-title">Gelap</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-outline ki-screen fs-2"></i>
                                                </span>
                                                <span class="menu-title">Sistem</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-link btn-color-danger w-100 text-danger rounded">Keluar</button>
                                    </form>
                                    {{-- <a href="{{ route('logout') }}" class="">Keluar</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('content')
                </div>
                <div id="kt_app_footer" class="app-footer">
                    <div
                        class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>&copy;
                            </span>
                            <a href="{{ route('dashboard.dokter') }}" target="_blank"
                                class="text-gray-800 text-hover-primary">MediTalk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <script>
        var hostUrl = "../resources/";
    </script>
    <script src="{{ asset('js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/widgets.bundle.js') }}"></script> --}}
    <script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('js/custom/widgets.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#switchAvailConsult').on('change', function () {
                const dokterId = $(this).data('id');
                const isChecked = $(this).is(':checked');
                const status = isChecked ? 'aktif' : 'tidak';
    
                $.ajax({
                    url: 'https://meditalk.catalogrpl.com/dokter/update-status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: dokterId,
                        status: status
                    },
                    success: function (res) {
                        $('#statusText').text(res.status === 'aktif' ? 'Tersedia' : 'Tidak Tersedia');
                    },
                    error: function (err) {
                        alert('Gagal mengubah status');
                        $(this).prop('checked', !isChecked);
                    }
                });
            });
        });
    </script>
    
</body>

</html>
