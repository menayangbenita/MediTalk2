<!DOCTYPE html>
<html>

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
    <script src="{{ asset('/plugins/global/plugins.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}">

    <title>MediTalk | Login</title>
</head>

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
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
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Logo-->
            <a href="{{ '/' }}" class="d-block d-lg-none mx-auto py-20">
                <img src="{{ asset('images/Logo.svg') }}" alt="Logo MediTalk" class="theme-dark-show h-25px">
                <img src="{{ asset('images/Logo.svg') }}" alt="Logo MediTalk" class="theme-dark-show h-25px">
            </a>
            <!--end::Logo-->
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                    <!--begin::Header-->
                    <div class="d-flex flex-stack py-2">
                        <!--begin::Back link-->
                        {{-- <div class="me-2">
              <a href="{{ ('/') }}" class="btn btn-icon bg-light rounded-circle">
                <i class="ki-outline ki-black-left fs-2 text-gray-800"></i>
              </a>
            </div> --}}
                        <!--end::Back link-->
                        <!--begin::Sign Up link-->
                        {{-- <div class="m-0">
              <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Belum memiliki akun?</span>
              <a href="{{ route('login') }}" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign In</a>
            </div> --}}
                        <!--end::Sign Up link=-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="py-20">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url=""
                            action="{{ route('login') }}" method="POST">
                            @csrf
                            <!--begin::Heading-->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="text-start mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Masuk</h1>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Selamat
                                    datang kembali di MediTalk!</div>
                                <!--end::Link-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <input class="form-control form-control-lg form-control-solid" type="email"
                                    placeholder="Masukkan email Anda" name="email" autocomplete="off" required
                                    data-kt-translate="sign-up-input-email" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password"
                                            placeholder="Masukkan kata sandi" name="password" autocomplete="off"
                                            data-kt-translate="sign-up-input-password" />
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-outline ki-eye-slash fs-2"></i>
                                            <i class="ki-outline ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack">
                                <!--begin::Submit-->
                                <button id="kt_sign_in_submit" class="btn btn-primary w-100" type="submit"
                                    data-kt-translate="sign-in-submit">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Masuk</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Harap Tunggu ...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                                <!--end::Submit-->
                                <!--begin::Social-->
                                {{-- <div class="d-flex align-items-center">
                      <div class="text-gray-400 fw-semibold fs-6 me-6">Or</div>
                    </div> --}}
                                <!--end::Social-->
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                        <div class="mt-10 text-center">
                            <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Belum
                                memiliki akun?</span>
                            <a href="{{ route('register') }}" class="link-primary fw-bold fs-5"
                                data-kt-translate="sign-up-head-link">Buat sekarang!</a>
                        </div>
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="m-0">
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat register-page"
                style="background-image: url('../resources/media/auth/register.jpg')"></div>
            <!--begin::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root--> <!--begin::Javascript-->
    <script>
        var hostUrl = "../resources/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    {{-- <script src="{{ asset('js/custom/authentication/sign-up/general.js') }}"></script> --}}
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
