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
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                            <input type="text" data-kt-konsultasi-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Cari Riwayat Konsultasi" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                </div>
                <div class="card-body p-9 pt-0">
                    <div class="table-responsive">
                        <table id="kt_konsultasi_table"
                            class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Dokter</th>
                                    <th>Diagnosis</th>
                                    <th>Resep</th>
                                    <th class="w-70px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600 text-start text-wrap">
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = $('#kt_konsultasi_table').DataTable({
            pageLength: 5,
            ordering: false,
            lengthMenu: [5, 10, 25, 50, 100],
            language: {
                search: "Cari:",
                paginate: {
                    previous: "",
                    next: ""
                },
                lengthMenu: "_MENU_",
                zeroRecords: "Data tidak ditemukan",
                info: "",
                infoEmpty: "Tidak ada data",
                infoFiltered: ""
            }
        });

        const inputSearch = document.querySelector('[data-kt-konsultasi-filter="search"]');
        inputSearch.addEventListener('keyup', function() {
            table.search(this.value).draw();
        });

        $('[data-kt-pasien-filter="status"]').on('change', function() {
            const val = $(this).val();
            let keyword = '';

            if (val === "all" || val === "") {
                keyword = '';
            } else if (val === 'aktif') {
                keyword = 'Tersedia';
            } else if (val === 'tidak') {
                keyword = 'Tidak Tersedia';
            }

            table.column(5).search(keyword, false, true).draw();
        });
    });
</script>
@endsection