@extends('layouts.app-pasien')

@section('title', 'MediTalk | Profil Dokter')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Profil Dokter</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard.pasien') }}" class="text-muted text-hover-primary">Beranda</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('konsultasi') }}" class="text-muted text-hover-primary">Konsultasi dengan
                                    Dokter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5">
                    <div class="card-body p-8 pb-4">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-150px symbol-lg-175px symbol-fixed position-relative">
                                    <img src="{{ asset('storage/' . $dokter->dokter->foto) }}" alt="image" />
                                    @if ($dokter->status_chat == 'Tersedia')
                                        <div
                                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border-4 border-white h-20px w-20px">
                                        </div>
                                    @elseif ($dokter->dokter->status == 'Tidak Tersedia')
                                        {{-- <div
                                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-danger rounded-circle border-4 border-body h-20px w-20px">
                                                </div> --}}
                                    @elseif ($dokter->dokter->status == 'Sibuk')
                                        <div
                                            class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-warning rounded-circle border-4 border-body h-20px w-20px">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-wrap fw-semibold fs-5 mb-2">
                                            <div class="d-flex align-items-center text-primary me-5 mb-2">
                                                Dokter Spesialis {{ $dokter->dokter->spesialis }}</div>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-1 fw-bold">{{ $dokter->dokter->nama }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-start flex-wrap mb-5">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-70px py-2 px-4 me-3 mb-3">
                                        <div class="fs-7 fw-bold text-gray-700">
                                            <i class="bi bi-hand-thumbs-up-fill me-2"></i>
                                            95%
                                        </div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-80px py-2  px-4 mb-3">
                                        <div class="fs-7 fw-bold text-gray-700">
                                            <i class="bi bi-briefcase-fill me-2"></i>
                                            {{ now()->year - (int) ($dokter->dokter->mulai_praktik ?? now()->year) }} Tahun
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            <div class="mb-5">
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold">
                                                        {{ 'Rp ' . number_format($dokter->dokter->tarif, 0, ',', '.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card card-xl-stretch mb-5">
                            <div class="card-body pt-8">
                                <div class="d-flex align-items-sm-center mb-8">
                                    <i class="bi bi-mortarboard text-primary fs-3x me-4"></i>
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                            <div class="text-gray-800 fw-bold fs-6">Alumnus</div>
                                            <span class="text-muted fw-semibold d-block pt-1">{{ $dokter->dokter->alumnus }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-sm-center mb-8">
                                    <i class="bi bi-hospital text-primary fs-3x me-4"></i>
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                            <div class="text-gray-800 fw-bold fs-6">Tempat Praktik</div>
                                            <span
                                                class="text-muted fw-semibold d-block pt-1">{{ $dokter->dokter->tempat_praktik }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-sm-center">
                                    <i class="bi bi-file-earmark-binary text-primary fs-3x me-4"></i>
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                            <div class="text-gray-800 fw-bold fs-6">STR (Surat Tanda
                                                Registrasi)</div>
                                            <span class="text-muted fw-semibold d-block pt-1">{{ $dokter->dokter->str }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="card card-xl-stretch mb-5">
                            <div class="card-body pt-8">
                                @if (session('error'))
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: "{{ session('error') }}",
                                        });
                                    </script>
                                @endif

                                <div class="d-flex align-items-sm-center mb-5">
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2">
                                            <div class="text-gray-800 fw-medium fs-6">Biaya Sesi 60
                                                menit
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                {{ 'Rp ' . number_format($dokter->dokter->tarif, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-sm-center mb-7">
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2">
                                            <div class="text-gray-800 fw-medium fs-6">Biaya Layanan
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                Rp 2.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed border-secondary"></div>
                                <div class="d-flex align-items-sm-center my-7">
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2">
                                            <div class="text-gray-800 fw-bolder fs-6">Total Pembayaran
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fw-bolder">
                                                {{ 'Rp ' . number_format($dokter->dokter->tarif + 2000, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-sm-center">
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0">
                                        <div class="flex-grow-1 my-lg-0 my-2">
                                            @if ($dokter->dokter->status == 'aktif')
                                                <form action="{{ route('transaksi.konsultasi') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="dokter_id" value="{{ $dokter->dokter->id }}">
                                                    <input type="hidden" name="amount"
                                                        value="{{ $dokter->dokter->tarif + 2000 }}">
                                                    <button type="submit" class="btn btn-primary fw-bolder fs-6 w-100">
                                                        Bayar & Mulai Konsultasi
                                                    </button>
                                                </form>
                                            @elseif ($dokter->dokter->status == 'Tidak Tersedia')
                                                <a href="#" class="btn btn-light fw-bolder fs-6 w-100"
                                                    disabled>Tidak Tersedia
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-light fw-bolder fs-6 w-100"
                                                    disabled>Kuota konsultasi dokter sudah penuh
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
@endsection
