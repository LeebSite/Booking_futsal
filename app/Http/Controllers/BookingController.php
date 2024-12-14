<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::where('status', 'tersedia')->get();
        return view('customer.bookinglap', compact('lapangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        Pesanan::create([
            'id_pengguna' => Auth::id(),
            'id_lapangan' => $request->id_lapangan,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 'menunggu_konfirmasi',
        ]);

        return redirect()->route('customer.booking')->with('success', 'Pemesanan berhasil dibuat. Silakan tunggu konfirmasi.');
    }
}
