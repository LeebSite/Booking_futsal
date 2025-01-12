<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Pesanan;
use App\Models\JadwalLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan daftar lapangan berdasarkan tanggal yang dipilih
    public function index(Request $request)
    {
        $tanggal = $request->query('tanggal', now()->toDateString());

        $lapangan = Lapangan::with(['pesanan' => function ($query) use ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }])->get();

        return view('customer.bookinglap.index', compact('lapangan', 'tanggal'));
    }

    // Menampilkan form untuk memesan lapangan tertentu
    public function create($id, Request $request)
    {
        $lapangan = Lapangan::findOrFail($id);
        $tanggalDipilih = $request->query('tanggal', now()->toDateString()); // Ambil tanggal dari parameter atau default hari ini
        $jadwal = JadwalLapangan::where('id_lapangan', $id)
            ->where('tanggal', $tanggalDipilih)
            ->get();

        return view('customer.bookinglap.create', compact('lapangan', 'jadwal', 'tanggalDipilih'));
    }

    // Menyimpan data pesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'id_lapangan' => 'required|exists:lapangan,id',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telepon' => 'required|string|max:15',
            'tanggal' => 'required|date',
            'jam' => 'required|array|min:1',
        ]);
    
        // Cek apakah jam yang dipilih tersedia
        $jadwalKosong = JadwalLapangan::where('id_lapangan', $request->id_lapangan)
            ->where('tanggal', $request->tanggal)
            ->whereIn('jam', $request->jam)
            ->where('status', 'kosong')
            ->count();
    
        if ($jadwalKosong !== count($request->jam)) {
            return back()->withErrors(['jam' => 'Beberapa jam yang dipilih sudah tidak tersedia.']);
        }
    
        // Proses penyimpanan pesanan
        $lapangan = Lapangan::findOrFail($request->id_lapangan);
        $jumlahJam = count($request->jam);
        $totalBiaya = $jumlahJam * $lapangan->harga_per_jam;
    
        $pesanan = Pesanan::create([
            'id_lapangan' => $lapangan->id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'jam' => implode(', ', $request->jam),
            'jumlah_jam' => $jumlahJam,
            'total_biaya' => $totalBiaya,
            'status' => 'pending',
        ]);
    
        JadwalLapangan::where('id_lapangan', $lapangan->id)
            ->where('tanggal', $request->tanggal)
            ->whereIn('jam', $request->jam)
            ->update(['status' => 'dipesan']);
    
        return redirect()->route('customer.booking')->with('success', 'Pesanan berhasil dibuat!');
    }
    

    // Menampilkan detail pesanan
    public function show($id)
    {
        $pesanan = Pesanan::with('lapangan')->findOrFail($id);
        return view('customer.bookinglap.detail', compact('pesanan'));
    }
}
