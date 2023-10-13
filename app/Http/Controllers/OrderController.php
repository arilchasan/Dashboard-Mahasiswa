<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function gabungMatkul(Request $request)
    {
        if (auth('mahasiswa')->user()->role == 'mahasiswa') {
            $request->validate([
                'matkul_id' => 'required',
                'mahasiswa_id' => 'required',
            ]);

            $order = new Order([
                'mahasiswa_id' => $request->mahasiswa_id,
                'matkul_id' => $request->matkul_id,
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            
            $order->save();
    
            return redirect()->back()->with('success', 'Berhasil mengambil mata pelajaran');
        } else {
            return redirect('/error');
        }
    }

    public function approve($id)
    {
        if (auth()->user()->role !== 'dosen') {
            return redirect('/error');        
        }

        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'success',
        ]);

        return redirect()->back()->with('success', 'Berhasil menyetujui permintaan mata pelajaran');
    }

    public function reject($id)
    {
        if (auth()->user()->role !== 'dosen') {
            return redirect('/error');        
        }

        $order = Order::findOrFail($id);

        $order->update([
            'status' => 'failed',
        ]);

        return redirect()->back()->with('error', 'Berhasil menolak permintaan mata pelajaran');
    }
}

