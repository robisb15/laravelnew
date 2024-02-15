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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->string('id_pendaftaran')->primary();
            $table->string('id_layanan');
            $table->string('kode_pendaftaran');
            $table->string('status');
            $table->string('id_berkas')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('user_id');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
