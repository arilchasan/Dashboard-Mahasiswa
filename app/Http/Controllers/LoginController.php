<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
}
