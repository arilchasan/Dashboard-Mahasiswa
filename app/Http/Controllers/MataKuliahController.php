<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $idM = auth('mahasiswa')->user()->id;
        $matkul_id = MataKuliah::where('kode_mata_kuliah', $id)->get()->first();
        $mahasiswa = Mahasiswa::whereHas('orders', function ($query) use ($id) {
            $query->where('status', 'success');
        })->where('jurusans_id', $id)->get();
        return view('admin.matkul.detail', ['matkul' => $matkul, 'jurusan' => $jurusan, 'idM' => $idM , 'matkul_id' => $matkul_id, 'mahasiswa' => $mahasiswa]);
    }

    public function permintaan() {
        $order = Order::all();
        return view('admin.dosen.permintaan', ['order' => $order]);
    }
}
