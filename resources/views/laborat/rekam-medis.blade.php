@extends('layouts.app-laborat')

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
                                <input type="text" data-kt-ecommerce-product-filter="search"
                                    class="form-control form-control-solid w-250px ps-12" placeholder="Cari Rekam Medis" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" onclick="resetForm()" class="btn btn-primary" id="btnTambah"
                                data-bs-toggle="modal" data-bs-target="#kt_tambah_rekammedis">
                                Tambah Rekam Medis
                            </button>
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-150px">Dokter</th>
                                        <th class="min-w-150px">Nama</th>
                                        <th class="min-w-100px">Tanggal</th>
                                        <th class="text-end min-w-70px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600 text-start">
                                    @foreach ($rekamMedis as $rekam)
                                        <tr>
                                            <td>
                                                <div class="text-primary fs-5 fw-bold"
                                                    data-kt-dokter-filter="{{ $rekam->dokter->nama }}">
                                                    {{ $rekam->dokter->nama }}</div>
                                                <div class="text-muted fs-7 fw-bold">Spesialis
                                                    {{ $rekam->dokter->spesialis }}</div>
                                            </td>
                                            <td class="fw-bold">
                                                <div class="text-primary fs-5 fw-bold"
                                                    data-kt-dokter-filter="{{ $rekam->pasien->nama }}">
                                                    {{ $rekam->pasien->nama }}</div>
                                                <div class="text-muted fs-7 fw-bold">No. RM: {{ $rekam->pasien->nrm }}</div>
                                            </td>
                                            <td>{{ $rekam->tanggal }}</td>
                                            <td class="d-flex justify-content-end">
                                                <a class="btn btn-icon btn-light-primary fs-7 me-2 btnDetail"
                                                    data-bs-toggle="modal" data-bs-target="#kt_detail_rekammedis"
                                                    data-id="{{ $rekam->id }}" data-anamnesis="{{ $rekam->anamnesis }}"
                                                    data-tanda-vital="{{ $rekam->tanda_vital }}"
                                                    data-diagnosis="{{ $rekam->diagnosis }}"
                                                    data-medikasi="{{ $rekam->medikasi }}"
                                                    data-pasien="{{ $rekam->pasien->nama }}"
                                                    data-rekammedis="{{ $rekam->pasien->rekammedis }}"
                                                    data-dokter="{{ $rekam->dokter->nama }}"
                                                    data-spesialis="{{ $rekam->dokter->spesialis }}"
                                                    data-str="{{ $rekam->dokter->str }}"
                                                    data-umur="{{ \Carbon\Carbon::parse($rekam->pasien->tanggal_lahir)->diff(\Carbon\Carbon::now())->y }}"
>
                                                    <i class="ki-solid ki-information-2 fs-2"></i>
                                                </a>
                                                <button type="submit" class="btn btn-icon btn-light-primary fs-7 me-2">
                                                    <i class="ki-solid ki-pencil fs-2"></i>
                                                </button>
                                                <form action="{{ route('laborat.rekammedis.destroy', $rekam->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus rekam medis ini?');">
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
    </div>

    <div class="modal fade" tabindex=" -1" id="kt_tambah_rekammedis">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-850px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h3 class="modal-title" id="dokterModalLabel">Tambah Rekam Medis</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form novalidate="novalidate" id="kt_tambah_dokter" autocomplete="off"
                        data-kt-redirect-url="{{ route('rekammedis') }}" action="{{ route('laborat.rekammedis.store') }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <!--begin::Input group-->
                        <div class="row mb-8">
                            <div class="col-lg-4">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Tanggal</span>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" type="date" name="tanggal"
                                    id="tanggal">
                            </div>
                            <div class="col-lg-4">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama Pasien</span>
                                </label>
                                <!--end::Label-->
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                    data-placeholder="Select option" data-allow-clear="true" name="pasien_id"
                                    id="pasien_id" data-dropdown-parent="#kt_tambah_rekammedis">
                                    <option value=""></option>
                                    @foreach ($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama Dokter</span>
                                </label>
                                <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                    data-placeholder="Select option" data-allow-clear="true" name="dokter_id"
                                    id="dokter_id" data-dropdown-parent="#kt_tambah_rekammedis">
                                    <option value=""></option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-8">
                            <div class="col-lg-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Anamnesis</span>
                                </label>
                                <!--end::Label-->
                                <textarea name="anamnesis" id="anamnesis" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Sakit tenggorokan"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Tanda-tanda Vital</span>
                                </label>
                                <!--end::Label-->
                                <textarea name="tanda_vital" id="tanda_vital" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Suhu: 37.5°C, RR: 20"></textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-8">
                            <div class="col-lg-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Diagnosis</span>
                                </label>
                                <textarea name="diagnosis" id="diagnosis" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Tonsilitis"></textarea>
                            </div>
                            <div class="col-lg-6">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Medikasi</span>
                                </label>
                                <textarea name="medikasi" id="medikasi" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Paracetamol 500mg"></textarea>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button id="kt_tambah_dokter_submit" class="btn btn-primary" type="submit"
                        data-kt-translate="sign-up-submit">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Simpan Data</span>
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

    <div class="modal fade" tabindex="-1" id="kt_detail_rekammedis">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable mw-850px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h3 class="modal-title" id="rekamMedisModalLabel">Detail Rekam Medis</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form novalidate="novalidate" id="kt_detail_dokter" autocomplete="off">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-lg-6 mb-8">
                                <div class="d-flex">
                                    <img src="{{ asset('images/user.jpg') }}"
                                        class="img-fluid w-70px rounded border me-4" alt="">
                                    <div>
                                        <div class="fw-bold fs-4 mb-1" id="detailPasien"></div>
                                        <div class="fs-6 text-muted" id="detailRekammedis"></div>
                                        <div class="fs-6 text-muted" id="detailUmur">tahun</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-8">
                                <div class="d-flex">
                                    <img src="{{ asset('images/user.jpg') }}"
                                        class="img-fluid w-70px rounded border me-4" alt="">
                                    <div>
                                        <div class="fw-bold fs-4 mb-1" id="detailDokter"></div>
                                        <div class="fs-6 text-muted" id="detailSpesialis"></div>
                                        <div class="">
                                            <div class="fs-6 text-muted" id="detailStr">No. STR:</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Input group-->
                        <div class="row">
                            <div class="col-lg-6 mb-8">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Anamnesis</span>
                                </label>
                                <!--end::Label-->
                                <textarea name="anamnesis" id="detailAnamnesis" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Sakit tenggorokan" readonly></textarea>
                            </div>
                            <div class="col-lg-6 mb-8">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Tanda-tanda Vital</span>
                                </label>
                                <!--end::Label-->
                                <textarea name="tanda_vital" id="detailTanda_vital" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Suhu: 37.5°C, RR: 20" readonly></textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="row">
                            <div class="col-lg-6 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Diagnosis</span>
                                </label>
                                <textarea name="diagnosis" id="detailDiagnosis" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Tonsilitis" readonly></textarea>
                            </div>
                            <div class="col-lg-6 mb-8">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Medikasi</span>
                                </label>
                                <textarea name="medikasi" id="detailMedikasi" class="form-control form-control-solid" rows="1"
                                    placeholder="Cth: Paracetamol 500mg" readonly></textarea>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.btnDetail').click(function() {
                $('#rekamMedisModalLabel').text('Detail Rekam Medis');
                $('#id').val($(this).data('id'));
                $('#detailAnamnesis').val($(this).data('anamnesis'));
                $('#detailTanda_vital').val($(this).data('tanda-vital'));
                $('#detailDiagnosis').val($(this).data('diagnosis'));
                $('#detailMedikasi').val($(this).data('medikasi'));
                $('#detailPasien').text($(this).data('pasien'));
                $('#detailRekammedis').text($(this).data('rekammedis'));
                $('#detailDokter').text($(this).data('dokter'));
                $('#detailSpesialis').text($(this).data('spesialis'));
                $('#detailStr').text($(this).data('str'));
                $('#detailUmur').text($(this).data('umur') + ' tahun');
            });
        });
    </script>
@endsection
