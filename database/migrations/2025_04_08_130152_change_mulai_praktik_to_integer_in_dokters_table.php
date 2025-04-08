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
            $table->integer('mulai_praktik')->change();
        });
    }

    public function down()
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->date('mulai_praktik')->change(); 
        });
    }
};
