@extends('layouts.app-laborat')

@section('title', 'MediTalk | Dashboard Laborat')

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
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-xl-12">
                            <div class="card card-xl-stretch mb-xl-1"
                                style="background: linear-gradient(45deg, #8c46c9, #72C5D7); min-height: 160px;height: auto;">
                                <div class="card-body d-flex flex-column position-relative">
                                    <a href="{{ route('laborat.rekammedis.index') }}"
                                        class="btn btn-outline btn-outline-dashed btn-outline-secondary position-absolute bottom-0 end-0 m-5">
                                        Tambah Rekam Medis
                                    </a>
                                    <div class="text-white fw-bold fs-2 mb-2" style="margin-bottom: 30px;">SELAMAT DATANG
                                        LABORATORIUM</div>
                                    <div class="fw-semibold text-white" style="margin-top: 15px; max-width: 500px;">kami
                                        mengembangkan solusi digital untuk membantu rumah sakit mengelola data pasien dengan
                                        lebih akurat, aman, dan efisien.</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection