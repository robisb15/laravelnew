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
        Schema::create('syarat_berkas', function (Blueprint $table) {
            $table->string('id_syarat_berkas')->primary();
            $table->string('id_layanan');
            $table->string('id_jenis_file');
            $table->string('status');
            $table->integer('urut');
            $table->integer('wajib');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_berkas');
    }
};
