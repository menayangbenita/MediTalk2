@extends('layouts.app-laborat')

@section('title', 'MediTalk | Edit Rekam Medis')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Rekam Medis Pasien</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">Edit Rekam Medis Pasien</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-5 box-shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold m-0">Data Rekam Medis</h3>
                    </div>
                    <form class="form" action="{{ route('laborat.rekammedis.update', $rekam->id) }}" id="form_data_diri_pasien" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body p-9">
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-6">
                                    <label for="namaLengkap" class="form-label required">Anamnesis</label>
                                    <input type="text" class="form-control form-control-solid" name="anamnesis"
                                        placeholder="Cth: Batuk dan pilek sejak 4 hari yang lalu" id="anamnesis" value="{{ $rekam->anamnesis }}" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="Tanda-tanda Vital" class="form-label required">Tanda-tanda Vital</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Cth: Suhu: 36.5°C, Nadi: 82x/menit, RR: 20x/menit, Tekanan Darah: 150/95 mmHg" id="tanda_vital"
                                        name="tanda_vital" value="{{ $rekam->tanda_vital }}" />
                                </div>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-6 mt-2">
                                    <label for="Diagnosis" class="form-label required">Diagnosis</label>
                                    <input class="form-control form-control-solid" placeholder="Cth: ISPA ringan"
                                        id="diagnosis" name="diagnosis" value="{{ $rekam->diagnosis }}" />
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="Medikasi" class="form-label required">Medikasi</label>
                                    <input class="form-control form-control-solid" placeholder="Cth: Paracetamol 500mg, 3x sehari jika demam" id="medikasi"
                                        name="medikasi" value="{{ $rekam->medikasi }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-5">
                            <a href="{{ route('laborat.rekammedis.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" id="form_data_diri_pasien" class="btn btn-primary">
                                <span class="indicator-label">Simpan Perubahan</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
