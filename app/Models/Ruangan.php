<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $fillable = ['nama_ruangan','kode_ruangan'];

    public function matakuliah()
    {
        return $this->hasMany(MataKuliah::class , 'ruangan_id' , 'kode_ruangan');
    }
}
