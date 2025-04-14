@extends('layouts.app-superadmin')

@section('title', 'MediTalk | Data Dokter')

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Master
                            Dokter</h1>
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
                                <input type="text" data-kt-dokter-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari Dokter" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                    data-placeholder="Status" data-kt-dokter-filter="status">
                                    <option></option>
                                    <option value="all">Semua</option>
                                    <option value="aktif">Tersedia</option>
                                    <option value="tidak">Tidak Tersedia</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <button type="button" onclick="resetForm()" class="btn btn-primary" id="btnTambah"
                                data-bs-toggle="modal" data-bs-target="#kt_tambah_dokter">
                                Tambah Dokter
                            </button>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dokter_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text=center min-w25px">Nomor</th>
                                        <th class="min-w-200px">Dokter</th>
                                        <th class="text-end min-w-100px">Email</th>
                                        <th class="text-end min-w-100px">Tarif</th>
                                        <th class="text-end min-w-70px">Rating</th>
                                        <th class="text-end min-w-70px">Status</th>
                                        <th class="text-end min-w-70px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @php $i = 1; @endphp
                                    @foreach ($dokters as $dokter)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Thumbnail-->
                                                    <a data-bs-toggle="modal" data-bs-target="#kt_detail_dokter"
                                                        class="symbol symbol-50px">
                                                        <span class="symbol-label"
                                                            style="background-image:url({{ asset('storage/' . $dokter->foto) }});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a data-bs-toggle="modal" data-bs-target="#kt_detail_dokter"
                                                            class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                            data-id="{{ $dokter->id }}"
                                                            data-kt-dokter-filter="doctor_name">{{ $dokter->nama }}</a>
                                                        <div class="text-muted fs-7 fw-bold">Spesialis
                                                            {{ $dokter->spesialis }}</div>
                                                        <!--end::Title-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span class="fw-bold">{{ $dokter->email }}</span>
                                            </td>
                                            <td class="text-end pe-0">
                                                <span
                                                    class="fw-bold">{{ 'Rp ' . number_format($dokter->tarif, 0, ',', '.') }}</span>
                                            </td>
                                            <td class="text-end pe-0" data-order="Published">
                                                <!--begin::Badges-->
                                                <div class="badge badge-light-success">98%</div>
                                                <!--end::Badges-->
                                            </td>
                                            <td class="text-end pe-0" data-order="{{ $dokter->status }}">
                                                @if ($dokter->status == 'aktif')
                                                    <div class="badge badge-light-success">Tersedia</div>
                                                @elseif ($dokter->status == 'tidak')
                                                    <div class="badge badge-light-danger">Tidak Tersedia</div>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus dokter ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-icon btn-light-primary fs-7">
                                                        <i class="ki-solid ki-trash fs-2"></i>
                                                    </button>
                                                </form>
                                                {{-- <a href="#"
                                                    class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                                                    <i class="ki-outline ki-down fs-5 ms-1"></i></a> --}}
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a data-bs-toggle="modal" data-bs-target="#kt_tambah_dokter"
                                                            class="menu-link px-3 btnEdit">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    {{-- <div class="menu-item px-3">
                                                        <form action="{{ route('akundokter.hapus', $dokter->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus dokter ini?');">
                                                            @csrf
                                                            <button type="submit" class="menu-link px-3">Hapus</button>
                                                        </form>
                                                        <a href="{{ route('akundokter.hapus') }}{{ $dokter->id }}"
                                                            class="menu-link px-3"
                                                            data-kt-ecommerce-product-filter="delete_row">Hapus</a>
                                                    </div> --}}
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
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

        <div class="modal fade" tabindex="-1" id="kt_tambah_dokter">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-850px">
                <div class="modal-content rounded">
                    <div class="modal-header">
                        <h3 class="modal-title" id="dokterModalLabel">Tambah Dokter</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <form novalidate="novalidate" id="kt_tambah_dokter" autocomplete="off" data-url-edit=""
                            data-kt-redirect-url="" action="{{ route('dokter.store') }}" method="post"
                            enctype="multipart/form-data">
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
                                        <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
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
                                        id="nama" placeholder="Cth: Kaeya Alberich" required />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Spesialis</span>
                                    </label>
                                    <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                        data-placeholder="Pilih spesialis" data-allow-clear="true" name="spesialis"
                                        id="spesialis" data-dropdown-parent="#kt_tambah_dokter" required>
                                        <option value=""></option>
                                        <option value="Anak">Spesialis Anak (Sp.A)</option>
                                        <option value="Bedah">Spesialis Bedah (Sp.B)</option>
                                        <option value="Bedah Anak">Spesialis Bedah Anak (Sp.BA)</option>
                                        <option value="Bedah Plastik">Spesialis Bedah Plastik, Rekonstruksi & Estetik
                                            (Sp.BP-RE)</option>
                                        <option value="Bedah Orthopedi">Spesialis Bedah Orthopedi & Traumatologi (Sp.OT)
                                        </option>
                                        <option value="Bedah Saraf">Spesialis Bedah Saraf (Sp.BS)</option>
                                        <option value="Bedah Urologi">Spesialis Urologi (Sp.U)</option>
                                        <option value="Bedah Kardiovaskular">Spesialis Bedah Toraks, Kardiak & Vaskular
                                            (Sp.BTKV)</option>
                                        <option value="Jantung">Spesialis Jantung & Pembuluh Darah (Sp.JP)</option>
                                        <option value="THT">Spesialis Telinga, Hidung, Tenggorokan, Bedah Kepala &
                                            Leher (Sp.THT-KL)</option>
                                        <option value="Penyakit Dalam">Spesialis Penyakit Dalam (Sp.PD)</option>
                                        <option value="Paru">Spesialis Pulmonologi & Kedokteran Respirasi (Sp.P)
                                        </option>
                                        <option value="Saraf">Spesialis Neurologi (Sp.N)</option>
                                        <option value="Mata">Spesialis Mata (Sp.M)</option>
                                        <option value="Obgyn">Spesialis Obstetri & Ginekologi (Sp.OG)</option>
                                        <option value="Kulit dan Kelamin">Spesialis Kulit & Kelamin (Sp.KK)</option>
                                        <option value="Anestesi">Spesialis Anestesiologi & Terapi Intensif (Sp.An)
                                        </option>
                                        <option value="Kedokteran Jiwa">Spesialis Kedokteran Jiwa / Psikiater (Sp.KJ)
                                        </option>
                                        <option value="Gizi Klinik">Spesialis Gizi Klinik (Sp.GK)</option>
                                        <option value="Patologi Klinik">Spesialis Patologi Klinik (Sp.PK)</option>
                                        <option value="Patologi Anatomi">Spesialis Patologi Anatomi (Sp.PA)</option>
                                        <option value="Radiologi">Spesialis Radiologi (Sp.Rad)</option>
                                        <option value="Forensik">Spesialis Forensik & Medikolegal (Sp.F)</option>
                                        <option value="Rehabilitasi Medis">Spesialis Kedokteran Fisik & Rehabilitasi
                                            (Sp.KFR)</option>
                                        <option value="Kedokteran Olahraga">Spesialis Kedokteran Olahraga (Sp.KO)
                                        </option>
                                        <option value="Gigi">Spesialis Kedokteran Gigi (Sp.KG)</option>
                                        <option value="Gigi Anak">Spesialis Kedokteran Gigi Anak (Sp.KGA)</option>
                                    </select>
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
                                        id="email" placeholder="Cth: alberichkaeya@meditalk.com" required />
                                </div>
                                <div class="col-lg-6">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Kata sandi</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="password" class="form-control form-control-solid" name="password"
                                        id="password" placeholder="Cth: kaeya123." required />
                                    <div class="form-text">Gunakan 8 karakter atau lebih dengan kombinasi huruf, angka, dan
                                        simbol.</div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Alumnus</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="alumnus"
                                        id="alumnus" placeholder="Cth: Universitas MediTalk" required />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Nomor STR</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="str"
                                        id="str" placeholder="Cth: HF00393820322" required />
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tempat Praktik</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" name="tempat_praktik"
                                        id="tempat_praktik" placeholder="Cth: Malang, Jawa Timur" required />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-block fw-semibold fs-6 mb-2">
                                        <span class="required">Mulai Praktik</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Tahun dimulainya praktik">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="mulai_praktik"
                                        id="mulai_praktik" value="20" required />
                                </div>
                            </div>
                            <div class="row mb-8">
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Tarif</span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="tarif"
                                        id="tarif" placeholder="Cth: 25000" required />
                                </div>
                                <div class="col-lg-6">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Maksimal Chat</span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="maksimal_chat"
                                        id="maksimal_chat" value="3" required />
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button id="kt_tambah_dokter_submit" class="btn btn-primary" type="submit"
                            data-kt-translate="sign-up-submit">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Simpan</span>
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
                const table = $('#kt_dokter_table').DataTable({
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

                const inputSearch = document.querySelector('[data-kt-dokter-filter="search"]');
                inputSearch.addEventListener('keyup', function() {
                    table.search(this.value).draw();
                });

                $('[data-kt-dokter-filter="status"]').on('change', function() {
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
