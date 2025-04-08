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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['pending', 'berlangsung', 'selesai', 'hangus']);
            $table->timestamp('pembayaran_berhasil_at')->nullable();
            $table->timestamp('dimulai_at')->nullable();
            $table->timestamp('berakhir_at')->nullable();
            $table->timestamp('terakhir_dibalas_pasien')->nullable();
            $table->boolean('liked')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
