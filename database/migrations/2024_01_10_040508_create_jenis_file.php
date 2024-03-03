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
        Schema::create('jenis_file', function (Blueprint $table) {
            $table->string('id_jenis_file')->primary();
            $table->string('nama');
            $table->string('keterangan');
            $table->integer('status');
            $table->integer('multiple_files')$table->string('keterangan');;
            $table->string('id_berkas')->nullable();
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_file');
    }
};
