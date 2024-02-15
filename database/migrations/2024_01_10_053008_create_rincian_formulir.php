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
        Schema::create('rincian_formulir', function (Blueprint $table) {
            $table->string('id_rincian_formulir')->primary();
            $table->string('id_layanan');
            $table->string('nama');
            $table->string('jenis');
            $table->string('isi')->nullable();
            $table->string('urut');
            $table->string('tag');
            $table->string('status');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rincian_formulir');
    }
};
