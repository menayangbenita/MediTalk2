@extends('layouts.app-superadmin')

@section('title', 'MediTalk | Data Pasien')

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Master Pasien</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                <input type="text" data-kt-pasien-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari Pasien" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_pasien_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-center min-w25px">Nomor</th>
                                        <th class="min-w-200px">Nama Pasien</th>
                                        <th class="text-start min-w-100px">Nomor Rekam Medis</th>
                                        <th class="text-start min-w-100px">Tanggal Lahir</th>
                                        <th class="text-start min-w-100px">Nomor Telepon</th>
                                        <th class="text-start min-w-100px">Email</th>
                                        <th class="text-end min-w-70px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @php $i = 1; @endphp
                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $pasien->nama }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $pasien->nrm }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $pasien->tanggal_lahir }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $pasien->telepon }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $pasien->user?->email ?? '-' }}</span>
                                            </td>
                                            <td class="text-end">
                                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus pasien ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-light-primary fs-">
                                                        <i class="ki-solid ki-trash fs-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>

            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const table = $('#kt_pasien_table').DataTable({
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

                const inputSearch = document.querySelector('[data-kt-pasien-filter="search"]');
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
