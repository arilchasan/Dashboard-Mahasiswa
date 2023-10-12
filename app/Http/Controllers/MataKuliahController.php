<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $matkul = MataKuliah::all();
        return view('admin.matkul.matakuliah',['matkul' => $matkul]);
    }

    public function detail($id) {
        $matkul = MataKuliah::find($id);
        $jurusan = Mahasiswa::where('jurusans_id', $id)->get();
        return view('admin.matkul.detail', ['matkul' => $matkul, 'jurusan' => $jurusan]);
    }
}
