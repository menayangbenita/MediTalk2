@extends('layouts.app-pasien')

@section('title', 'MediTalk | Dashboard Pasien')

@section('content')
    {{-- @dd($rekammedispasien) --}}

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Beranda</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <span class="text-muted">Selamat Datang, {{ Auth::user()->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5">
                    <div class="card-body p-8 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <div class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                                No. RM: {{ Auth::user()->pasien->nrm }}
                                            </div>
                                            <div class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                                {{ Auth::user()->email }}
                                            </div>
                                            @php
                                                use Carbon\Carbon;

                                                $tanggal_lahir = Auth::user()->pasien->tanggal_lahir;
                                                $umur = Carbon::parse($tanggal_lahir)->diff(Carbon::now());
                                            @endphp

                                            <div class="d-flex align-items-center text-gray-400 mb-2">
                                                {{ $umur->y }} tahun, {{ $umur->m }} bulan, {{ $umur->d }}
                                                hari
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        <a href="{{ route('profil.show') }}" class="btn btn-sm btn-primary me-3">Lihat Profil
                                            Saya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-6">
                        @if ($status === 'belum')
                            @include('pasien.dashboard.cards.belum')
                        @elseif ($status === 'pending')
                            @include('pasien.dashboard.cards.pending')
                        @elseif ($status === 'berlangsung')
                            @include('pasien.dashboard.cards.berlangsung')
                        @elseif ($status === 'ended')
                            @include('pasien.dashboard.cards.ended')
                        @elseif ($status === 'hangus')
                            @include('pasien.dashboard.cards.hangus')
                        @endif

                    </div>
                    <div class="col-xl-6">
                        <div class="card card-xl-stretch mb-5">
                            <div class="card-header align-items-center border-0 mt-4">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-bold text-dark">Rekam Medis Terbaru</span>
                                </h3>
                            </div>
                            <div class="card-body pt-3">
                                @foreach ($rekammedispasien as $rekam)
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <i class="bi bi-file-earmark-medical fs-3x me-4"></i>
                                        <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                            <div class="flex-grow-1 my-lg-0 mb-2 me-2">
                                                <div class="text-gray-800 fw-bold text-hover-primary fs-6">{{ $rekam->dokter->nama }}</div>
                                                <span class="text-muted fw-semibold d-block pt-1">{{ \Carbon\Carbon::parse($rekam->tanggal)->translatedFormat('d F Y') }}</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-primary btnDetail btn-sm border-0"
                                                    data-bs-toggle="modal" data-bs-target="#kt_detail_rekammedis" 
                                                    data-id="{{ $rekam->id }}" 
                                                    data-anamnesis="{{ $rekam->anamnesis }}" 
                                                    data-tanda-vital="{{ $rekam->tanda_vital }}" 
                                                    data-diagnosis="{{ $rekam->diagnosis }}" 
                                                    data-medikasi="{{ $rekam->medikasi }}"
                                                    data-pasien="{{ $rekam->pasien->nama }}"
                                                    data-rekammedis="{{ $rekam->pasien->rekammedis }}"
                                                    data-dokter="{{ $rekam->dokter->nama }}"
                                                    data-spesialis="{{ $rekam->dokter->spesialis }}"
                                                    data-str="{{ $rekam->dokter->str }}">
                                                    Buka
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <img src="{{ asset('images/user.jpg') }}" class="img-fluid w-70px rounded border me-4"
                                        alt="">
                                    <div>
                                        <div class="fw-bold fs-4 mb-1" id="detailPasien"></div>
                                        <div class="fs-6 text-muted" id="detailRekammedis"></div>
                                        <div class="fs-6 text-muted">23 Tahun</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-8">
                                <div class="d-flex">
                                    <img src="{{ asset('images/user.jpg') }}" class="img-fluid w-70px rounded border me-4"
                                        alt="">
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
            });
        });
    </script>
@endsection
