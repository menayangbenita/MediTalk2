<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->string('norek')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('atas_nama')->nullable();
        });
    }

    public function down()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn(['norek', 'nama_bank', 'atas_nama']);
        });
    }
};
