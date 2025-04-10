@extends('layouts.app-pasien')

@section('title', 'MediTalk | Riwayat Konsultasi')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
        <div id="kt_app_toolbar_container"
            class="app-container container-xxl d-flex flex-stack flex-wrap">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1
                        class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        Riwayat Konsultasi</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5 mb-xl-5 box-shadow">
                <div class="card-header ">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Riwayat Konsultasi Saya</h3>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="table-responsive">
                        <table id="tabel_riwayat_konsultasi"
                            class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800 px-7">
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Dokter</th>
                                    <th>Diagnosis</th>
                                    <th>Resep</th>
                                    <th class="w-70px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>29 Jan 2025</td>
                                    <td>09.19 - 10.19</td>
                                    <td>dr. Kaeya Alberich, Sp.A (K)</td>
                                    <td>demam, batuk, kepala berkunang-kunang</td>
                                    <td>Panadol 1 strip</td>
                                    <td class="d-flex">
                                        <a href="./konsultasi_chat.html"
                                            class="btn btn-icon btn-circle btn-sm  btn-light-info p-2 me-2"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Lihat chat">
                                            <i class="bi bi-chat-right-dots fs-3"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection