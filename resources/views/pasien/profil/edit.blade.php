@extends('layouts.app-pasien')

@section('title', 'MediTalk | Profil')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Data Diri Pasien</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <li class="breadcrumb-item text-muted">Lengkapi data diri anda
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-5 box-shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold m-0">Data Pasien</h3>
                    </div>
                    <form class="form" action="{{ route('profil.update') }}" id="form_data_diri_pasien" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body p-9">
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-gray-600">DATA DIRI PASIEN</label>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-4 mt-2">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="cth: Andini Indana" id="namaLengkap" readonly value="{{ Auth::user()->name }}" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="cth: Malang"
                                        id="tempatLahir" name="tempat_lahir" value="{{ Auth::user()->pasien->tempat_lahir }}" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-solid" placeholder="Pilih Tanggal"
                                        id="tanggalLahir" name="tanggal_lahir" value="{{ Auth::user()->pasien->tanggal_lahir }}"  />
                                </div>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-4 mt-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-solid"
                                        placeholder="cth: andiniindana@gmail.com" id="email" readonly value="{{ Auth::user()->email }}" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control form-control-solid"
                                        placeholder="cth: 08123456890" id="nomorTelepon" name="telepon" value="{{ Auth::user()->pasien->telepon }}" />
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <label for="namaIbuKandung" class="form-label">Nama Ibu
                                        Kandung</label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="cth: Indriana" id="namaIbuKandung" name="nama_ibu" value="{{ Auth::user()->pasien->nama_ibu }}" />
                                </div>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-12 mt-2">
                                    <label for="nomorIdentitas" class="form-label">Nomor
                                        Identitas/KTP</label>
                                    <input type="number" class="form-control form-control-solid"
                                        placeholder="cth: 1234567890123456" id="nomorIdentitas" name="nik" value="{{ Auth::user()->pasien->nik }}"/>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-gray-600">ALAMAT IDENTITAS</label>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-6 mt-2">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control form-control-solid" data-kt-autosize="true" id="alamat" name="alamat">{{ Auth::user()->pasien->alamat }}</textarea>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="desaKelurahan" class="form-label">Desa/Kelurahan</label>
                                    <input class="form-control form-control-solid" placeholder="cth: Sukoharjo"
                                        id="tanggalLahir" name="desa" value="{{ Auth::user()->pasien->desa }}"/>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="kecamatan" class="form-control form-control-solid" placeholder="cth: Sukun"
                                        id="kecamatan" name="kecamatan" value="{{ Auth::user()->pasien->kecamatan }}" />
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="kotaKabupaten" class="form-label">Kota/Kabupaten</label>
                                    <input type="kotaKabupaten" class="form-control form-control-solid"
                                        placeholder="cth: Malang" id="kotaKabupaten" name="kota" value="{{ Auth::user()->pasien->kota }}" />
                                </div>
                            </div>
                            <div class="separator separator-dashed my-6"></div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-gray-600">SOSIAL</label>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-6 mt-2">
                                    <label for="selectAgama" class="form-label">Agama</label>
                                    <select class="form-select form-select-solid" aria-label="Pilih Agama" name="agama"
                                        id="selectAgama">
                                        <option {{ Auth::user()->pasien->agama == null ? 'selected' : '' }} disabled>Pilih Agama</option>
                                        <option {{ Auth::user()->pasien->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                                        <option {{ Auth::user()->pasien->agama == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                                        <option {{ Auth::user()->pasien->agama == 'Katolik' ? 'selected' : '' }} value="Katolik">Katolik</option>
                                        <option {{ Auth::user()->pasien->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                                        <option {{ Auth::user()->pasien->agama == 'Buddha' ? 'selected' : '' }} value="Buddha">Buddha</option>
                                        <option {{ Auth::user()->pasien->agama == 'Konghuchu' ? 'selected' : '' }} value="Konghuchu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="selectStatusPerkawinan" class="form-label">Status
                                        Perkawinan</label>
                                    <select class="form-select form-select-solid" aria-label="Pilih Status Perkawinan"
                                        id="selectStatusPerkawinan" name="status_perkawinan">
                                        <option {{ Auth::user()->pasien->status_perkawinan == null ? 'selected' : '' }} disabled>Pilih Status Perkawinan</option>
                                        <option {{ Auth::user()->pasien->status_perkawinan == 'Kawin' ? 'selected' : '' }} value="Kawin">Kawin</option>
                                        <option {{ Auth::user()->pasien->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }} value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-lg-5 mt-sm-5">
                                <div class="col-lg-6 mt-2">
                                    <label for="selectPendidikan" class="form-label">Pendidikan
                                        Terakhir</label>
                                    <select class="form-select form-select-solid" aria-label="Pilih Pendidikan Terakhir"
                                        id="selectPendidikan" name="pendidikan">
                                        <option {{ Auth::user()->pasien->pendidikan == null ? 'selected' : '' }} disabled selected>Pilih Pendidikan Terakhir</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Tidak/Belum Sekolah' ? 'selected' : '' }} value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Tamat SD/Sederajat' ? 'selected' : '' }} value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'SLTA/Sederajat' ? 'selected' : '' }} value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'SLTP/Sederajat' ? 'selected' : '' }} value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Belum Tamat SD/Sederajat' ? 'selected' : '' }} value="Belum Tamat SD/Sederajat">Belum Tamat SD/Sederajat</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Diploma IV/Strata I' ? 'selected' : '' }} value="Diploma IV/Strata I">Diploma IV/Strata I</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'KaDiploma I/IIwin' ? 'selected' : '' }} value="Diploma I/II">Diploma I/I I</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Akademi/Diploma III/S. Muda' ? 'selected' : '' }} value="Akademi/Diploma III/S. Muda">Akademi/Diploma III/S.Muda</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Strata II' ? 'selected' : '' }} value="Strata II">Strata II</option>
                                        <option {{ Auth::user()->pasien->pendidikan == 'Strata III' ? 'selected' : '' }} value="Strata III">Strata III</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="cth: PNS"
                                        id="pekerjaan" name="pekerjaan" value="{{ Auth::user()->pasien->pekerjaan }}" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-5">
                            <a href="{{ route('profil.show') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" id="form_data_diri_pasien" class="btn btn-primary">
                                <span class="indicator-label">Simpan Perubahan</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
