<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(5);
        return view('admin.mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request) {
        $rules = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);
        if($rules->fails()){
            return redirect()->back()->with('errors', 'Data Mahasiswa Gagal Ditambahkan');
        } else {
            $mahasiswa = Mahasiswa::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
                'age' => $request->age
            ]);
            return redirect('/admin/mahasiswa/list')->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
        }
    }

    public function update(Request $request,int $id)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);
        if ($rules->fails()) {
            return redirect('/admin/mahasiswa/list')->with('errors', 'Data Mahasiswa Gagal Diupdate');
        } else {
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
                'age' => $request->age
            ]);
        }
         return redirect('/admin/mahasiswa/list')->with('success', 'Data Mahasiswa Berhasil Diupdate');

    }

    public function detail($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('admin.mahasiswa.detail', ['mahasiswa' => $mahasiswa ]);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect('/admin/mahasiswa/list')->with('success', 'Data Mahasiswa Berhasil Dihapus');
    }
}
