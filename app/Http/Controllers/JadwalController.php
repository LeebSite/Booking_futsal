<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapangan;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class JadwalLapanganController extends Controller
{
    public function create(Lapangan $lapangan)
    {
        return view('admin.jadwal.create', compact('lapangan'));
    }

    public function store(Request $request, Lapangan $lapangan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'status' => 'required|in:kosong,dipesan,terkonfirmasi',
        ]);

        JadwalLapangan::create([
            'id_lapangan' => $lapangan->id_lapangan,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status
        ]);

        return redirect()->route('lapangan.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }
}
