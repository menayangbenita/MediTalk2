@extends('layouts.app-pasien')

@section('title', 'MediTalk | Rekam Medis')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Rekam Medis</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-5 box-shadow">
                    <div class="card-header ">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Hasil Rekam Medis</h3>
                        </div>
                    </div>
                    <div class="card-body p-9">
                        <div class="table-responsive">
                            <table id="tabel_rekam_medis"
                                class="table align-middle table-row-dashed fs-6 gy-5">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0 e">
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Anamnesis</th>
                                        <th>Tanda-tanda Vital</th>
                                        <th>Diagnosis</th>
                                        <th>Medikamentosa</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600 text-start text-wrap">
                                    @foreach ($rekamMedis as $rekam )
                                    <tr>
                                        <td>{{ $rekam->tanggal }}</td>
                                        <td>
                                            <div class="text-primary fs-5 fw-bold" data-kt-dokter-filter="{{ $rekam->dokter->nama }}">
                                                {{ $rekam->dokter->nama }}</div>
                                            <div class="text-muted fs-7 fw-bold">Spesialis
                                                {{ $rekam->dokter->spesialis }}</div>
                                        </td>
                                        <td>{{ $rekam->anamnesis }}</td>
                                        <td>{{ $rekam->tanda_vital }}</td>
                                        <td>{{ $rekam->diagnosis }}</td>
                                        <td>{{ $rekam->medikasi }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
