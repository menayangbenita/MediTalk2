@extends('layouts.app-superadmin')

@section('title', 'MediTalk | Penarikan Dana')

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Penarikan Dana</h1>
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                        <input type="text" data-kt-penarikan-filter="search"
                                            class="form-control form-control-solid w-250px ps-12"
                                            placeholder="Cari Penarikan Dana" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Card title-->
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <div class="card-body pt-0">
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_penarikan_table">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-center min-w-50px">No</th>
                                            <th class="min-w-50px">Tanggal & Waktu</th>
                                            <th class="min-w-50px">No. rek</th>
                                            <th class="text-start min-w-150px">Nama Penarik</th>
                                            <th class="text-start min-w-50px">Nominal Penarikan</th>
                                            <th class="text-end min-w-50px">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @php $i = 1; @endphp
                                        @foreach ($pengajuan as $item)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}
                                                </td>
                                                <td class="text-start text-dark">
                                                    {{ $item->dokter->norek ?? '-' }}
                                                </td>
                                                <td class="text-start">
                                                    {{ $item->dokter->nama ?? '-' }}
                                                </td>
                                                <td class="text-start">
                                                    Rp{{ number_format($item->jumlah, 0, ',', '.') }}
                                                </td>
                                                <td class="text-end">
                                                    @if ($item->status === 'pending')
                                                        <form action="{{ route('penarikan.reject', $item->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="badge py-3 px-4 fs-7 badge-light-danger border-0">Tolak</button>
                                                        </form>

                                                        <form action="{{ route('penarikan.approve', $item->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="badge py-3 px-4 fs-7 badge-light-success border-0 me-2">Terima</button>
                                                        </form>
                                                    @else
                                                        <span
                                                            class="badge py-3 px-4 fs-7 badge-light">{{ ucfirst($item->status) }}</span>
                                                    @endif
                                                </td>
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
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = $('#kt_penarikan_table').DataTable({
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

            const inputSearch = document.querySelector('[data-kt-penarikan-filter="search"]');
            inputSearch.addEventListener('keyup', function() {
                table.search(this.value).draw();
            });

            $('[data-kt-penarikan-filter="status"]').on('change', function() {
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
