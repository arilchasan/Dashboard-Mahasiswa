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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->enum('role', ['admin', 'dosen', 'mahasiswa']);
            $table->string('gender');
            $table->string('phone');
            $table->string('address');
            $table->integer('age');
            $table->integer('jurusans_id')->references('kode_jurusan')->on('mata_kuliah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
