@extends('layouts.app-superadmin')

@section('title', 'MediTalk | Dashboard Super Admin')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10 box-shadow">
                    <div class="card-header ">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Beranda Super Admin</h3>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <!--begin::Statistics Widget 4-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body p-0">
                                                <div class="d-flex flex-stack card-p flex-grow-1">
                                                    <span class="symbol symbol-50px me-2">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="bi bi-currency-dollar fs-2x text-success"></i>
                                                        </span>
                                                    </span>
                                                    <div class="d-flex flex-column text-end">
                                                        <span class="text-dark fw-bold fs-2">Rp.300.000</span>
                                                        <span class="text-muted fw-semibold mt-1">Pemasukan</span>
                                                    </div>
                                                </div>
                                                <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 4-->
                                    </div>
                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 4-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body p-0">
                                                <div class="d-flex flex-stack card-p flex-grow-1">
                                                    <span class="symbol symbol-50px me-2">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="bi bi-postcard-heart fs-2x text-primary"></i>
                                                        </span>
                                                    </span>
                                                    <div class="d-flex flex-column text-end">
                                                        <span class="text-dark fw-bold fs-2">25</span>
                                                        <span class="text-muted fw-semibold mt-1">Dokter Aktif</span>
                                                    </div>
                                                </div>
                                                <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 4-->
                                        
                                    </div>
                                    <div class="col-xl-4">
                            <!--begin::Statistics Widget 4-->
                            <div class="card card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-info">
                                                <i class="bi bi-person-vcard fs-2x text-info"></i>
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span class="text-dark fw-bold fs-2">+50</span>
                                            <span class="text-muted fw-semibold mt-1">Pasien Baru</span>
                                        </div>
                                    </div>
                                    <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="info" style="height: 150px"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 4-->
                        </div>
                                </div>
                            </div>
                        </div>

                </div>

                
            </div>
        </div>
    @endsection