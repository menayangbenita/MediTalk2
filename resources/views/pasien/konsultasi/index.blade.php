@extends('layouts.app-pasien')

@section('title', 'MediTalk | Konsultasi')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5 pt-lg-10">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack flex-wrap">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                            Konsultasi dengan Dokter</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center position-relative" data-kt-customer-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-filter fs-2"></i>Pilih Berdasarkan Spesialis</button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                id="kt-toolbar-filter">
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5">
                                    <div class="mb-10">
                                        <label class="form-label fs-5 fw-semibold mb-3">Spesialis:</label>
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-dropdown-parent="#kt-toolbar-filter">>
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
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                            data-kt-customer-table-filter="filter">Terapkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text" data-kt-customer-table-filter="search"
                                class="form-control form-control w-250px ps-12" placeholder="Cari Dokter" />
                        </div>
                    </div>

                </div>
                <div class="row g-6 g-xl-9">
                    @foreach ($dokters as $dokter)
                        <div class="col-md-6 col-xxl-3 doctor-card" data-poli="{{ $dokter->dokter->spesialis }}">
                            <div class="card">
                                <div class="card-body d-flex flex-center flex-column p-9">
                                    <div class="mb-5">
                                        <div class="symbol symbol-200px">
                                            <img alt="Pic" class="img-fluid"
                                                src="{{ asset('storage/' . $dokter->dokter->foto) }}" />
                                            @if ($dokter->dokter->status == 'aktif')
                                                <div
                                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border-4 border-white h-20px w-20px">
                                                </div>
                                            @elseif ($dokter->dokter->status == 'tidak')
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
                                    <a href=""
                                        class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $dokter->dokter->nama }}</a>
                                    <div class="fw-semibold text-gray-400 mb-6">Dokter Spesialis {{ $dokter->dokter->spesialis }}
                                    </div>
                                    <div class="d-flex flex-center flex-wrap mb-5">
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-70px py-2 px-4 mx-3 mb-3">
                                            <div class="fs-7 fw-bold text-gray-700">
                                                <i class="bi bi-hand-thumbs-up-fill me-2"></i>
                                                95%
                                            </div>
                                        </div>
                                        <div
                                            class="border border-gray-300 border-dashed rounded min-w-80px py-2 mx-3 px-4 mb-3">
                                            <div class="fs-7 fw-bold text-gray-700">
                                                <i class="bi bi-briefcase-fill me-2"></i>
                                                {{ now()->year - (int) ($dokter->dokter->mulai_praktik ?? now()->year) }} Tahun
                                            </div>
                                        </div>
                                    </div>
                                    @if ($dokter->dokter->status == 'aktif')
                                        <a href="{{ route('profildokter', ['id' => $dokter->id]) }}"
                                            class="btn btn-sm btn-light-primary fw-bold" data-id="{{ $dokter->id }}">
                                            Chat
                                            <i class="bi bi-arrow-right ms-2"></i>
                                        </a>
                                    @elseif ($dokter->dokter->status == 'tidak')
                                        <div class="btn btn-sm btn-light fw-bold">Tidak tersedia</div>
                                    @elseif ($dokter->dokter->status == 'Sibuk')
                                        <div class="btn btn-sm btn-light fw-bold">Sibuk</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex flex-stack flex-wrap pt-10">
                    <div class="fs-6 fw-semibold text-gray-700">Showing 1 to 10 of 50 entries</div>
                    <ul class="pagination">
                        <li class="page-item previous">
                            <a href="#" class="page-link">
                                <i class="previous"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">5</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">6</a>
                        </li>
                        <li class="page-item next">
                            <a href="#" class="page-link">
                                <i class="next"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // JS Filter pilihan dokter berdasarkan poli/spesialis
                const applyFilterButton = document.querySelector("[data-kt-customer-table-filter='filter']");
                const resetFilterButton = document.querySelector("[data-kt-customer-table-filter='reset']");
                const selectPoli = document.querySelector("[data-kt-select2='true']");
                const doctorCards = document.querySelectorAll(".doctor-card");
                const searchInput = document.querySelector("[data-kt-customer-table-filter='search']");

                applyFilterButton.addEventListener("click", function() {
                    const selectedPoli = selectPoli.value;

                    doctorCards.forEach(card => {
                        if (!selectedPoli || card.getAttribute("data-poli") === selectedPoli) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                });

                resetFilterButton.addEventListener("click", function() {
                    selectPoli.value = "";
                    doctorCards.forEach(card => {
                        card.style.display = "block";
                    });
                });

                searchInput.addEventListener("input", function() {
                    const searchText = searchInput.value.toLowerCase();

                    doctorCards.forEach(card => {
                        const doctorName = card.querySelector("a").textContent.toLowerCase();
                        const doctorSpecialty = card.querySelector(".fw-semibold").textContent
                            .toLowerCase();

                        if (doctorName.includes(searchText) || doctorSpecialty.includes(searchText)) {
                            card.style.display = "block";
                        } else {
                            card.style.display = "none";
                        }
                    });
                });
            });
        </script>
    @endsection
