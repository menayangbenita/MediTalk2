@extends('layouts.app-superadmin')

@section('title', 'MediTalk | Data Laborat')

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Master Laborat</h1>
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
                                <input type="text" data-kt-laborat-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari Laborat" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" onclick="resetForm()" class="btn btn-primary" id="btnTambah"
                                data-bs-toggle="modal" data-bs-target="#kt_tambah_laborat">
                                Tambah Laborat
                            </button>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_laborat_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text=center min-w25px">Nomor</th>
                                        <th class="min-w-200px">Laborat</th>
                                        <th class="text-start min-w-100px">Email</th>
                                        <th class="text-end min-w-70px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @php $i = 1; @endphp
                                    @foreach ($laborats as $laborat)
                                        <tr>
                                            <td class="text-left">{{ $i++ }}</td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $laborat->name }}</span>
                                            </td>
                                            <td class="text-start pe-0">
                                                <span class="fw-bold">{{ $laborat->email }}</span>
                                            </td>
                                            <td class="text-end">
                                                <form action="{{ route('laborat.destroy', $laborat->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus laborat ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-light-primary fs-7">
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

        <div class="modal fade" tabindex="-1" id="kt_tambah_laborat">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-850px">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h3 class="modal-title" id="dokterModalLabel">Tambah Laborat</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <form novalidate="novalidate" id="kt_tambah_dokter" autocomplete="off"
                            data-url-edit=""
                            data-kt-redirect-url="{{ route('laborat.index') }}" action="{{ route('laborat.store') }}"
                            method="post">
                            @csrf()
                            <input type="hidden" name="id" id="id">
                            <!--begin::Input group-->
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Nama Laborat</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="nama"
                                        id="nama" placeholder="Cth: Kaeya Alberich" />
                                </div>
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Alamat email</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="form-control form-control-solid" name="email"
                                        id="email" placeholder="Cth: alberichkaeya@meditalk.com" />
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Kata sandi</span>
                                </label>
                                <!--end::Label-->
                                <input type="password" class="form-control form-control-solid" name="password"
                                    id="password" placeholder="Cth: kaeya123." />
                                <div class="form-text">Gunakan 8 karakter atau lebih dengan kombinasi huruf, angka, dan
                                    simbol.</div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button id="kt_tambah_dokter_submit" class="btn btn-primary" type="submit"
                            data-kt-translate="sign-up-submit">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Simpan perubahan</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Harap Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="kt_detail_laborat">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-850px">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h3 class="modal-title">Detail Dokter</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <form novalidate="novalidate" id="kt_tambah_dokter"
                            data-kt-redirect-url="{{ route('laborat.index') }}" action="{{ route('laborat.index') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf()
                            <input type="hidden" name="id" id="id">
                            <div class="fv-row mb-8">
                                <!--begin::Label-->
                                <label class="d-block fw-semibold fs-6 mb-5">
                                    <span class="required">Foto Dokter</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Masukkan foto dokter">
                                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Image input placeholder-->
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image.svg');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                                    }
                                </style>
                                <!--end::Image input placeholder-->
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder"
                                    data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti foto">
                                        <i class="ki-outline ki-pencil fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus foto">
                                        <i class="ki-outline ki-cross fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Jenis file yang diizinkan: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Nama Dokter</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" name="nama"
                                        id="nama" placeholder="Cth: Kaeya Alberich" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Spesialis</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="spesialis"
                                        id="spesialis" placeholder="Cth: Obgyn" />
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Alamat email</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="email" class="form-control form-control-solid" name="email"
                                        id="email" placeholder="Cth: alberichkaeya@meditalk.com" />
                                </div>
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Kata sandi</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="password" class="form-control form-control-solid" name="password"
                                        id="password" placeholder="Cth: kaeya123." />
                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Alumnus</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="alumnus"
                                        id="alumnus" placeholder="Universitas MediTalk" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Nomor STR</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="str"
                                        id="nomor_str" placeholder="Cth: HF00393820322" />
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tempat Praktik</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="tempat_praktik"
                                        id="tempat_praktik" placeholder="Cth: Malang, Jawa Timur" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-block fw-semibold fs-6 mb-2">
                                        <span class="required">Mulai Praktik</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Tahun dimulainya praktik">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="lama_praktik"
                                        id="lama_praktik" value="3" />
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tarif</span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="tarif"
                                        id="tempat_praktik" placeholder="25000" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Maksimal Chat</span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="maksimal_chat"
                                        id="maksimal_chat" value="3" />
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button id="kt_tambah_dokter_submit" class="btn btn-primary" type="submit"
                            data-kt-translate="sign-up-submit">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Simpan perubahan</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Harap Tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const table = $('#kt_laborat_table').DataTable({
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

                const inputSearch = document.querySelector('[data-kt-laborat-filter="search"]');
                inputSearch.addEventListener('keyup', function() {
                    table.search(this.value).draw();
                });

                $('[data-kt-laborat-filter="status"]').on('change', function() {
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
