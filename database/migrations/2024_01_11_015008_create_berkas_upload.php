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
       Schema::create('berkas_upload', function (Blueprint $table) {
            $table->string('id_berkas_upload')->primary();
            $table->string('id_pendaftaran');
            $table->string('id_syarat_berkas');
            $table->string('id_jenis_file');
            $table->string('id_berkas');
            $table->integer('status');
            $table->string('keterangan')->nullable();
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_upload');
    }
};
