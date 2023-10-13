<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $fillable = ['kode_mata_kuliah','nama_mata_kuliah', 'desc' , 'dosen_id' , 'kuota' , 'waktu' , 'hari' , 'waktu_selesai', 'ruangan_id' , 'jurusan'  ];


    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class , 'matakuliah_id' , 'kode_mata_kuliah');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function jurusan()
    {
        return $this->hasMany(Mahasiswa::class , 'jurusans_id' , 'kode_jurusan');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
