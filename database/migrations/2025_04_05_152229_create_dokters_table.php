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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('spesialis');
            $table->string('alumnus');
            $table->string('str');
            $table->string('tempat_praktik');
            $table->integer('mulai_praktik');
            $table->integer('tarif');
            $table->integer('maksimal_chat');
            $table->enum('status', ['aktif', 'tidak'])->default('tidak');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
