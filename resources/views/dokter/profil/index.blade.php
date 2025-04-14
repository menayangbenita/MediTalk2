@extends('layouts.app-dokter')

@section('title', 'MediTalk | Profil Dokter')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Profil Saya</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card mb-5 mb-xl-5 box-shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Data Dokter</h3>
                        </div>
                        <button type="button" onclick="resetForm()" class="btn btn-primary" id="btnTambah"
                            data-bs-toggle="modal" data-bs-target="#kt_ubah_password">
                            Ubah Kata Sandi
                        </button>
                    </div>
                    <div class="card-body p-9">
                        <div class="row">
                            <div class="col-lg-2 d-flex justify-content-center">
                                <div class="symbol symbol-125px">
                                    <img src="{{ asset('storage/' . Auth::user()->dokter->foto) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">{{ $dokter->nama }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Alumnus</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="fw-semibold fs-6 text-gray-800 me-2">{{ $dokter->alumnus }}</span>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Tempat
                                        Praktik</label>
                                    <div class="col-lg-8">
                                        <a href="#"
                                            class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $dokter->tempat_praktik }}</a>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Surat Tanda
                                        Registrasi</label>
                                    <div class="col-lg-8">
                                        <a href="#"
                                            class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $dokter->str }}</a>
                                    </div>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nama Bank</label>
                                    <form method="post" action="{{ route('dokter.profil.updateNamaBank', $dokter->id) }}"
                                        class="col-lg-8">
                                        @csrf
                                        <div class="d-flex">
                                            <select class="form-select form-select-solid fw-bold me-3 flex-grow-1"
                                                data-kt-select2="true" data-placeholder="Pilih bank" data-allow-clear="true"
                                                name="nama_bank" id="nama_bank" data-dropdown-parent="#kt_app_content"
                                                required>
                                                <optgroup label="Bank Umum Konvensional">
                                                    <option value="mandiri"
                                                        {{ $dokter->nama_bank === 'mandiri' ? 'selected' : '' }}>Bank
                                                        Mandiri</option>
                                                    <option value="bri"
                                                        {{ $dokter->nama_bank === 'bri' ? 'selected' : '' }}>Bank BRI
                                                    </option>
                                                    <option value="bni"
                                                        {{ $dokter->nama_bank === 'bni' ? 'selected' : '' }}>Bank BNI
                                                    </option>
                                                    <option value="bca"
                                                        {{ $dokter->nama_bank === 'bca' ? 'selected' : '' }}>Bank BCA
                                                    </option>
                                                    <option value="cimb"
                                                        {{ $dokter->nama_bank === 'cimb' ? 'selected' : '' }}>Bank CIMB
                                                        Niaga</option>
                                                    <option value="danamon"
                                                        {{ $dokter->nama_bank === 'danamon' ? 'selected' : '' }}>Bank
                                                        Danamon</option>
                                                    <option value="permata"
                                                        {{ $dokter->nama_bank === 'permata' ? 'selected' : '' }}>Bank
                                                        Permata</option>
                                                    <option value="panin"
                                                        {{ $dokter->nama_bank === 'panin' ? 'selected' : '' }}>Bank Panin
                                                    </option>
                                                    <option value="ocbc"
                                                        {{ $dokter->nama_bank === 'ocbc' ? 'selected' : '' }}>Bank OCBC
                                                        NISP</option>
                                                    <option value="btn"
                                                        {{ $dokter->nama_bank === 'btn' ? 'selected' : '' }}>Bank BTN
                                                    </option>
                                                    <option value="maybank"
                                                        {{ $dokter->nama_bank === 'maybank' ? 'selected' : '' }}>Bank
                                                        Maybank</option>
                                                    <option value="btpn"
                                                        {{ $dokter->nama_bank === 'btpn' ? 'selected' : '' }}>Bank BTPN
                                                    </option>
                                                    <option value="uob"
                                                        {{ $dokter->nama_bank === 'uob' ? 'selected' : '' }}>Bank UOB
                                                        Indonesia</option>
                                                    <option value="mega"
                                                        {{ $dokter->nama_bank === 'mega' ? 'selected' : '' }}>Bank Mega
                                                    </option>
                                                </optgroup>

                                                <optgroup label="Bank Digital">
                                                    <option value="blu"
                                                        {{ $dokter->nama_bank === 'blu' ? 'selected' : '' }}>blu by BCA
                                                        Digital</option>
                                                    <option value="jago"
                                                        {{ $dokter->nama_bank === 'jago' ? 'selected' : '' }}>Bank Jago
                                                    </option>
                                                    <option value="tmrw"
                                                        {{ $dokter->nama_bank === 'tmrw' ? 'selected' : '' }}>TMRW by UOB
                                                    </option>
                                                    <option value="digibank"
                                                        {{ $dokter->nama_bank === 'digibank' ? 'selected' : '' }}>Digibank
                                                        by DBS</option>
                                                    <option value="linebank"
                                                        {{ $dokter->nama_bank === 'linebank' ? 'selected' : '' }}>Line Bank
                                                        by Hana</option>
                                                    <option value="motionbanking"
                                                        {{ $dokter->nama_bank === 'motionbanking' ? 'selected' : '' }}>
                                                        MotionBanking</option>
                                                    <option value="neo"
                                                        {{ $dokter->nama_bank === 'neo' ? 'selected' : '' }}>Neo by Bank
                                                        Neo Commerce</option>
                                                    <option value="allobank"
                                                        {{ $dokter->nama_bank === 'allobank' ? 'selected' : '' }}>Allo Bank
                                                    </option>
                                                    <option value="seabank"
                                                        {{ $dokter->nama_bank === 'seabank' ? 'selected' : '' }}>SeaBank
                                                    </option>
                                                    <option value="raya"
                                                        {{ $dokter->nama_bank === 'raya' ? 'selected' : '' }}>Bank Raya
                                                    </option>
                                                    <option value="krom"
                                                        {{ $dokter->nama_bank === 'krom' ? 'selected' : '' }}>Krom Bank
                                                        Indonesia</option>
                                                </optgroup>

                                                <optgroup label="Bank Syariah">
                                                    <option value="bsi"
                                                        {{ $dokter->nama_bank === 'bsi' ? 'selected' : '' }}>Bank Syariah
                                                        Indonesia</option>
                                                    <option value="muamalat"
                                                        {{ $dokter->nama_bank === 'muamalat' ? 'selected' : '' }}>Bank
                                                        Muamalat</option>
                                                    <option value="mega_syariah"
                                                        {{ $dokter->nama_bank === 'mega_syariah' ? 'selected' : '' }}>Bank
                                                        Mega Syariah</option>
                                                    <option value="panin_syariah"
                                                        {{ $dokter->nama_bank === 'panin_syariah' ? 'selected' : '' }}>Bank
                                                        Panin Dubai Syariah</option>
                                                    <option value="bca_syariah"
                                                        {{ $dokter->nama_bank === 'bca_syariah' ? 'selected' : '' }}>Bank
                                                        BCA Syariah</option>
                                                    <option value="victoria_syariah"
                                                        {{ $dokter->nama_bank === 'victoria_syariah' ? 'selected' : '' }}>
                                                        Bank Victoria Syariah</option>
                                                </optgroup>

                                                <optgroup label="Bank Pembangunan Daerah (BPD)">
                                                    <option value="bjb"
                                                        {{ $dokter->nama_bank === 'bjb' ? 'selected' : '' }}>Bank BJB
                                                    </option>
                                                    <option value="jatim"
                                                        {{ $dokter->nama_bank === 'jatim' ? 'selected' : '' }}>Bank Jatim
                                                    </option>
                                                    <option value="jateng"
                                                        {{ $dokter->nama_bank === 'jateng' ? 'selected' : '' }}>Bank Jateng
                                                    </option>
                                                    <option value="dki"
                                                        {{ $dokter->nama_bank === 'dki' ? 'selected' : '' }}>Bank DKI
                                                    </option>
                                                    <option value="sumut"
                                                        {{ $dokter->nama_bank === 'sumut' ? 'selected' : '' }}>Bank Sumut
                                                    </option>
                                                    <option value="sumselbabel"
                                                        {{ $dokter->nama_bank === 'sumselbabel' ? 'selected' : '' }}>Bank
                                                        Sumsel Babel</option>
                                                    <option value="kalbar"
                                                        {{ $dokter->nama_bank === 'kalbar' ? 'selected' : '' }}>Bank Kalbar
                                                    </option>
                                                    <option value="kaltimtara"
                                                        {{ $dokter->nama_bank === 'kaltimtara' ? 'selected' : '' }}>Bank
                                                        Kaltimtara</option>
                                                    <option value="sulselbar"
                                                        {{ $dokter->nama_bank === 'sulselbar' ? 'selected' : '' }}>Bank
                                                        Sulselbar</option>
                                                </optgroup>
                                            </select>

                                            <button id="editbank" type="submit"
                                                class="btn btn-light fw-bold flex-shrink-0">Ubah
                                                Bank</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="row mt-7">
                                    <label class="col-lg-4 fw-semibold text-muted">Nomor
                                        Rekening</label>
                                    <form method="post"
                                        action="{{ route('dokter.profil.updateNoRekening', $dokter->id) }}"
                                        class="col-lg-8">
                                        @csrf
                                        <div class="d-flex">
                                            <input type="text" name="norek" pattern="\d{8,16}" maxlength="16"
                                                class="form-control form-control-solid fw-bold me-3 flex-grow-1"
                                                id="norek" value="{{ $dokter->norek }}" data-kt-inputmask="true"
                                                placeholder="Masukkan nomor rekening Anda" required>

                                            <button id="editrekening" type="submit"
                                                class="btn btn-light fw-bold flex-shrink-0">Ubah
                                                Nomor</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_ubah_password" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" method="post" action="{{ route('dokter.profil.updatePassword') }}" id="modal_tarik_dana_form">
                    @csrf
                    <div class="modal-header" id="modal_tarik_dana_header">
                        <h2 class="fw-bold">Ubah Kata Sandi</h2>
                        <div id="modal_tarik_dana_close" data-bs-dismiss="modal"
                            class="btn btn-icon btn-sm btn-active-icon-primary">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="col-lg-12 mb-4">
                            <label for="current_password" class="form-label required">Kata Sandi Lama</label>
                            <input type="password" class="form-control form-control-solid fw-bold" id="current_password"
                                name="current_password" required>
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <label for="new_password" class="form-label required">Kata Sandi Baru</label>
                                <input type="password" class="form-control form-control-solid fw-bold" id="new_password"
                                    name="new_password" required minlength="8">
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="new_password_confirmation" class="form-label required">Konfirmasi
                                    Kata Sandi Baru</label>
                                <input type="password" class="form-control form-control-solid fw-bold"
                                    id="new_password_confirmation" name="new_password_confirmation" required>
                                @error('new_password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer flex-center">
                            <button type="reset" id="modal_tarik_dana_cancel"
                                class="btn btn-light me-3">Batalkan</button>
                            <button type="submit" id="modal_tarik_dana_submit" class="btn btn-primary">
                                <span class="indicator-label">Ubah</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
