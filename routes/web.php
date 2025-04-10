<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasienAuthController;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
use App\Http\Controllers\DashboardPasienController;
use App\Http\Controllers\Dokter\PenarikanController;
use App\Http\Controllers\RekamMedisPasienController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\Superadmin\DokterController;
use App\Http\Controllers\Superadmin\LaboratController;
use App\Http\Controllers\Superadmin\PasienController;
use App\Http\Controllers\PenarikanDanaController;
use App\Http\Controllers\RekamMedisController;


Route::get('/', function () {
    return view('landing.index');
});


Route::get('/dokter-kami', function () {
    return view('landing.dokter-kami');
})->name('dokterkami');

Route::get('/register', [PasienAuthController::class, 'showRegistrationForm'])->name('pasien.register.form');
Route::post('/register', [Register::class, 'registerPasien'])->name('register');


Route::get('/login', [Login::class, 'showLoginForm'])->name('login');
Route::post('/login', [Login::class, 'login']);
Route::post('/logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [SuperadminController::class, 'index'])->name('dashboard.superadmin');
    Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
    Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
    Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
});

Route::prefix('superadmin/laborat')->middleware('auth')->group(function () {
    Route::get('/', [LaboratController::class, 'index'])->name('laborat.index');
    Route::post('/store', [LaboratController::class, 'store'])->name('laborat.store');
    Route::delete('/{id}', [LaboratController::class, 'destroy'])->name('laborat.destroy');
});

Route::prefix('superadmin')->middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
});

Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/penarikan', [PenarikanDanaController::class, 'index'])->name('penarikan.index');
    Route::post('/penarikan/approve/{id}', [PenarikanDanaController::class, 'approve'])->name('penarikan.approve');
    Route::post('/penarikan/reject/{id}', [PenarikanDanaController::class, 'reject'])->name('penarikan.reject');
});

Route::middleware(['auth', 'dokter'])->group(function () {
    // Route::post('/penarikan/store', [PenarikanDanaController::class, 'store'])->name('penarikan.store');
});

Route::middleware(['auth', 'role:laborat'])->prefix('laborat')->name('laborat.')->group(function () {
    Route::get('/', function () {
        return view('laborat.index');
    })->name('dashboard');

    Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekammedis.index');
    Route::post('/rekam-medis', [RekamMedisController::class, 'store'])->name('rekammedis.store');
    Route::get('/rekam-medis/{id}/edit', [RekamMedisController::class, 'edit'])->name('rekammedis.edit');
    Route::put('/rekam-medis/{id}', [RekamMedisController::class, 'update'])->name('rekammedis.update');
    Route::delete('/rekam-medis/{id}', [RekamMedisController::class, 'destroy'])->name('rekammedis.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/pasien', [App\Http\Controllers\DashboardPasienController::class, 'index'])->name('dashboard.pasien');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/profil', [App\Http\Controllers\ProfilPasienController::class, 'show'])->name('profil.show');
    Route::get('/profil/edit', [App\Http\Controllers\ProfilPasienController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [App\Http\Controllers\ProfilPasienController::class, 'update'])->name('profil.update');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/rekam-medis', [RekamMedisPasienController::class, 'index'])->name('rekammedis');
});
