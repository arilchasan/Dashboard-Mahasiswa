<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Berhasil Login sebagai Admin');
            } elseif ($role == 'dosen') {
                return redirect('/admin/dosen')->with('success', 'Berhasil Login sebagai Dosen');
            } elseif ($role == 'mahasiswa') {
                return redirect('/admin/mata-kuliah')->with('success', 'Berhasil Login sebagai Mahasiswa');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function indexMhs()
    {
        return view('admin.auth.loginMhs',);
    }

    public function register()
    {
        return view('admin.auth.registerMhs');
    }

    public function registerLoad(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
            'jurusans_id' => 'required',
        ]);

        Mahasiswa::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'age' => $request->age,
            'jurusans_id' => $request->jurusans_id,
            'role' => 'mahasiswa'
        ]);

        return redirect('/admin/login-mahasiswa')->with('success', 'Berhasil Daftar');
    }

    public function loginMhs(Request $request)
    {

        $credentials = $request->only('name', 'password');
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $role = Auth::guard('mahasiswa')->user()->role;
            if ($role == 'mahasiswa') {
                return redirect('/admin/mata-kuliah')->with('success', 'Berhasil Login sebagai Mahasiswa');
            }
        } else {
            return redirect()->back()->with('error', 'Login Gagal');
        }
    }
}
