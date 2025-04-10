@extends('layouts.app-dokter')

@section('title', 'MediTalk | Dashboard Dokter')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Beranda</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <span class="text-muted">Selamat Datang, {{ Auth::user()->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-xl-4 mb-xl-10">
                        <div class="card card-flush h-xl-100" style="background: linear-gradient(45deg, #8c46c9, #72C5D7);">
                            <div class="card-header rounded align-items-start h-225px">
                                <h3 class="card-title align-items-start flex-column text-white pt-10">
                                    <span class="fw-bold fs-2x mb-3">Statistik Konsultasi</span>
                                    <div class="fs-4 text-white">
                                        <span class="opacity-75">Hari ini</span>
                                        <span class="position-relative d-inline-block">
                                            <div class="link-white opacity-75-hover fw-bold d-block mb-1">
                                                10/2/2025</div>
                                        </span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body mt-n20">
                                <div class="mt-n20 position-relative">
                                    <div class="row g-3 g-lg-6">
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-sm">
                                                <div class="symbol symbol-30px me-5 mb-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-profile-user fs-2qx text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">4</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Konsultasi
                                                        Aktif</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-sm">
                                                <div class="symbol symbol-30px me-5 mb-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-double-check fs-2qx text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">21</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Konsultasi
                                                        Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-sm d-flex flex-column justify-content-between"
                                                style="height: 100%;">
                                                <div class="symbol symbol-30px me-5 mb-6">
                                                    <span class="symbol-label">
                                                        <i class="ki-duotone ki-wallet fs-2qx text-primary">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                        </i>
                                                    </span>
                                                </div>
                                                <div class="m-0" style="overflow: hidden;">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-1 lh-1 ls-n1 mb-1">Rp150.000</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Pendapatan
                                                        Masuk</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 shadow-sm">
                                                <div class="symbol symbol-30px me-5 mb-6">
                                                    <span class="symbol-label">
                                                        <i class="bi bi-hand-thumbs-up-fill fs-2x text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="m-0">
                                                    <span
                                                        class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">95%</span>
                                                    <span class="text-gray-500 fw-semibold fs-6">Rating
                                                        Saya</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-xl-10">
                        <div class="card card-flush h-auto">
                            <div class="card-header pt-7 mb-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Konsultasi Aktif</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="./konsultasi.html" class="btn btn-sm btn-light">Lihat Konsultasi</a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="m-0">
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No. RM:
                                                    123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-warning fs-6">
                                                        Proses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-warning fs-6">
                                                        Proses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-warning fs-6">
                                                        Proses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-warning fs-6">
                                                        Proses</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-xl-10">
                        <div class="card card-flush h-auto">
                            <div class="card-header pt-7 mb-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Konsultasi Selesai</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="./konsultasi.html" class="btn btn-sm btn-light">Lihat Konsultasi</a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="m-0">
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-success fs-6">
                                                        Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-success fs-6">
                                                        Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-success fs-6">
                                                        Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="symbol symbol-45px symbol-circle me-4">
                                            <img src="/demo42/dist/assets/media/avatars/300-10.jpg" alt="" />
                                        </div>
                                        <div class="d-flex flex-stack flex-row-fluid d-grid gap-2">
                                            <div class="me-5">
                                                <a href="#"
                                                    class="text-gray-800 fw-bold text-hover-primary fs-6">Jake</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">No.
                                                    RM: 123456</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-0">
                                                    <span class="badge badge-light-success fs-6">
                                                        Selesai</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
