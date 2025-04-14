<div class="card card-xl-stretch mb-xl-1"
    style="background: linear-gradient(45deg, #FFC107, #FFB74D); min-height: 160px;
                        height: auto;">
    <div class="card-body d-flex flex-column position-relative">
        <i class="ki-solid ki-messages text-white fs-3qx ms-n1"></i>
        <div class="text-white fw-bold fs-2 mb-2 mt-5">Sesi Belum Dimulai
        </div>
        <div class="fw-semibold text-white">Klik tombol di bawah ini untuk memulai konsultasi dengan dokter.</div>
        <a href="{{ route('pasien.chat', $konsultasi->id) }}"
            class="btn btn-outline btn-outline-dashed btn-outline-secondary position-absolute bottom-0 end-0 btn-cardinfo">
            Mulai
        </a>
    </div>
</div>