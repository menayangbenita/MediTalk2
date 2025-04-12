<div class="card card-xl-stretch mb-xl-1"
    style="background: linear-gradient(45deg, #2b9c63, #72C5D7); min-height: 160px;
                        height: auto;">
    <div class="card-body d-flex flex-column position-relative">
        <a href="{{ route('riwayat.konsultasi') }}"
            class="btn btn-outline btn-outline-dashed btn-outline-secondary position-absolute bottom-0 end-0 m-5">
            Lihat Riwayat Konsultasi
        </a>
        <i class="ki-solid ki-messages text-white fs-3qx ms-n1"></i>
        <div class="text-white fw-bold fs-2 mb-2 mt-5">Sesi Konsultasi Berakhir
        </div>
        <div class="fw-semibold text-white">dr. {{ $konsultasi->dokter->nama }}</div>
        <div class="fw-semibold text-white">
            {{ \Carbon\Carbon::parse($konsultasi->waktu_mulai)->format('H.i') }} -
            {{ \Carbon\Carbon::parse($konsultasi->waktu_selesai)->format('H.i') }}
        </div>
    </div>
</div>
