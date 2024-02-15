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
        Schema::create('berkas', function (Blueprint $table) {
            $table->string('id_berkas')->primary();
            $table->integer('status');
            $table->string('alasan')->nullable();
            $table->string('nama_file');
            $table->string('url');
            $table->string('jenis_file');
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
