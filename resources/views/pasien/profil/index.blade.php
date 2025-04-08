@extends('layouts.app-pasien')

@section('title', 'MediTalk | Profil')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Profil Saya</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card mb-5 mb-xl-5 box-shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Data Pasien</h3>
                        </div>
                        <a href="{{ route('profil.edit') }}" class="btn btn-primary ms-auto">Edit Data</a>
                    </div>
                    <div class="card-body p-9">
                        <div class="row">
                            <label class="col-lg-4 fw-bold text-gray-600">DATA DIRI PASIEN</label>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nama Lengkap</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Tempat Lahir</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->tempat_lahir ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Tanggal Lahir</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ date('d/m/Y', strtotime(Auth::user()->pasien->tanggal_lahir)) ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                    <div class="col-lg-8">
                                        <a href="#"
                                            class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ Auth::user()->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nomor
                                        Identitas/KTP</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->nik ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nomor Telepon
                                        Seluler</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-semibold fs-6 text-gray-800 me-2">{{ Auth::user()->pasien->telepon ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nama Ibu
                                        Kandung</label>
                                    <div class="col-lg-8">
                                        <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ Auth::user()->pasien->nama_ibu ?: '-' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-6"></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-bold text-gray-600">ALAMAT
                                        IDENTITAS</label>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Alamat</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->alamat ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Desa/Kelurahan</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->desa ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Kecamatan</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->kecamatan ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Kabupaten/Kota</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->kota ?: '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-bold text-gray-600">SOSIAL</label>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Agama</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->agama ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Status
                                        Perkawinan</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->status_perkawinan ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Pendidikan
                                        Terakhir</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->pendidikan ?: '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Pekerjaan</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ Auth::user()->pasien->pekerjaan ?: '-' }}</span>
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
