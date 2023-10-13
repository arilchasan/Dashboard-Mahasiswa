<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;

class Mahasiswa extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    
    protected $table = 'mahasiswa';
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'age',
        'matakuliah_id',
        'jurusans_id',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
