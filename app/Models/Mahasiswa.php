<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'age',
        'matakuliah_id',
        'jurusans_id'
    ];
    protected $guarded = ['id'];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(MataKuliah::class, 'jurusans_id', 'kode_jurusan');
    }
}
