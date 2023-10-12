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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_mata_kuliah');
            $table->string('nama_mata_kuliah');
            $table->text('desc');
            $table->integer('kuota');
            $table->string('waktu');
            $table->string('waktu_selesai');
            $table->string('hari');
            $table->integer('kode_jurusan');
            $table->string('jurusan');
            $table->integer('dosen_id');
            $table->integer('ruangan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
