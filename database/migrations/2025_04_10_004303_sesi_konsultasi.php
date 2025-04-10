<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sesi_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens');
            $table->foreignId('dokter_id')->constrained('dokters');
            $table->foreignId('pembayaran_id')->nullable(); // relasi ke transaksi Midtrans
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status', ['menunggu', 'berjalan', 'selesai', 'hangus'])->default('menunggu');
            $table->text('catatan')->nullable(); // optional
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
