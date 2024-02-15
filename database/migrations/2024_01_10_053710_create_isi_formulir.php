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
        Schema::create('isi_formulir', function (Blueprint $table) {
            $table->string('id_isi_formulir')->primary();
            $table->string('id_rincian_formulir');
            $table->string('id_pendaftaran');
            $table->string('id_layanan');
            $table->string('isi');
            $table->string('id_user');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_formulir');
    }
};
