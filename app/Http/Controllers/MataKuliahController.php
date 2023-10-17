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
    }//

    public function detail($id) {
        $matkul = MataKuliah::find($id);
        $matkul_id = MataKuliah::where('kode_mata_kuliah', $id)->get()->first();
        $mahasiswa = Order::where('matkul_id', $id)->get();
        $mahasiswaJurusan = auth('mahasiswa')->user()->jurusan['jurusan']; 
        $jurusan = MataKuliah::where('jurusan', $mahasiswaJurusan)->get();
        $status = Order::where('mahasiswa_id', auth('mahasiswa')->user()->id )->get()->pluck('status');
        $orderJum = Order::where('matkul_id', $matkul_id->id)->where('status', 'success')->get()->count();
        $count = $matkul->kuota - $orderJum;
        return view('admin.matkul.detail', 
        [
            'matkul' => $matkul, 
            'jurusan' => $jurusan , 
            'matkul_id' => $matkul_id, 
            'mahasiswa' => $mahasiswa,
            'status' => $status,
            'orderJum' => $orderJum,
            'count' => $count
            ]);
    }

    public function permintaan() {
        $order = Order::all();
        return view('admin.dosen.permintaan', ['order' => $order]);
    }
}
