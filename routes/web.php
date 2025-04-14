<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use App\Http\Controllers\Auth\PasienAuthController;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\Superadmin\DokterController;
use App\Http\Controllers\Superadmin\LaboratController;
use App\Http\Controllers\Superadmin\PasienController;
use App\Http\Controllers\Dokter\DashboardController;
use App\Http\Controllers\Dokter\PenarikanController;
use App\Http\Controllers\PenarikanDanaController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\Dokter\ProfilController;
use App\Http\Controllers\RekamMedisPasienController;
use App\Http\Controllers\ProfilPasienController;

Route::get('/', function () {
    $dokters = Dokter::latest()->take(4)->get();
    return view('landing.index', compact('dokters'));
})->name('landing');


Route::get('/dokter-kami', function () {
    $dokters = Dokter::all();
    return view('landing.dokter-kami', compact('dokters'));
})->name('dokterkami');

Route::get('/register', [PasienAuthController::class, 'showRegistrationForm'])->name('pasien.register.form');
Route::post('/register', [Register::class, 'registerPasien'])->name('register');


Route::get('/login', [Login::class, 'showLoginForm'])->name('login');
Route::post('/login', [Login::class, 'login']);
Route::post('/logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/dashboard/superadmin', [SuperadminController::class, 'index'])->name('dashboard.superadmin');
    Route::get('/dokter', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
    Route::delete('/dokter/destroy/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
});

Route::prefix('superadmin/laborat')->middleware('auth')->group(function () {
    Route::get('/', [LaboratController::class, 'index'])->name('laborat.index');
    Route::post('/store', [LaboratController::class, 'store'])->name('laborat.store');
    Route::delete('/destroy/{id}', [LaboratController::class, 'destroy'])->name('laborat.destroy');
});

Route::prefix('superadmin/pasien')->middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
    Route::delete('/destroy/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
});

Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/penarikan-dana', [PenarikanDanaController::class, 'index'])->name('penarikan.index');
    Route::post('/penarikan-dana/approve/{id}', [PenarikanDanaController::class, 'approve'])->name('penarikan.approve');
    Route::post('/penarikan-dana/reject/{id}', [PenarikanDanaController::class, 'reject'])->name('penarikan.reject');
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dashboard/dokter', [DashboardController::class, 'index'])->name( 'dashboard.dokter');
    Route::get('/rekam-medis/dokter', [RekamMedisController::class, 'rekamMedisPasien'])->name('dokter.rekam-medis');
    Route::get('/penarikan', [PenarikanController::class, 'index'])->name('dokter.penarikan.index');
    Route::post('/penarikan/store', [PenarikanDanaController::class, 'store'])->name('dokter.penarikan.store');
    Route::get('/profil/dokter', [ProfilController::class, 'show'])->name('dokter.profil.show');
    Route::get('/profil/dokter/edit', [ProfilController::class, 'edit'])->name('dokter.profil.edit');
    Route::post('/profil/{id}/update-nama-bank', [ProfilController::class, 'updateNamaBank'])->name('dokter.profil.updateNamaBank');
    Route::post('/profil/{id}/update-no-rekening', [ProfilController::class, 'updateNoRekening'])->name('dokter.profil.updateNoRekening');
    Route::post('/profil/update-password', [ProfilController::class, 'updatePassword'])->name('dokter.profil.updatePassword');
});

Route::get('/get-status', function () {
    $user = Auth::user();
    if (!$user) {
        return response()->json(['message' => 'User tidak ditemukan!'], 401);
    }
    return response()->json(['status' => $user->status]);
});

Route::post('/dokter/update-status', [DokterController::class, 'updateStatus']);

Route::middleware(['auth', 'role:laborat'])->name('laborat.')->group(function () {
    Route::get('/dashboard', function () {
        return view('laborat.index');
    })->name('dashboard');

    Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekammedis.index');
    Route::post('/rekam-medis/store', [RekamMedisController::class, 'store'])->name('rekammedis.store');
    Route::get('/rekam-medis/{id}/edit', [RekamMedisController::class, 'edit'])->name('rekammedis.edit');
    Route::put('/rekam-medis/{id}', [RekamMedisController::class, 'update'])->name('rekammedis.update');
    Route::delete('/rekam-medis/destroy/{id}', [RekamMedisController::class, 'destroy'])->name('rekammedis.destroy');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/dashboard', [DashboardPasienController::class, 'index'])->name('dashboard.pasien');
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
    Route::get('/profil-dokter/{id}', [KonsultasiController::class, 'dokter'])->name('profildokter');
    Route::get('/riwayat-konsultasi', [KonsultasiController::class, 'riwayat'])->name('riwayat.konsultasi');
    Route::get('/payment/webhook', [MidtransController::class, 'handleManualWebhook']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{sesiId}', [ChatController::class, 'index'])->name('pasien.chat');
    Route::get('/chat/messages/{sesiId}', [ChatController::class, 'getMessages'])->name('chat.messages');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/profil', [ProfilPasienController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [ProfilPasienController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [ProfilPasienController::class, 'update'])->name('profil.update');
    Route::post('/bayarkonsultasi', [MidtransController::class, 'bayarKonsultasi'])->name('transaksi.konsultasi');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/rekam-medis', [RekamMedisPasienController::class, 'index'])->name('rekammedis');
});
