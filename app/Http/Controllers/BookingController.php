<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function create($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('customer.bookinglap.create', compact('lapangan'));
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
            'jam_mulai' => 'required',
            'jumlah_jam' => 'required|integer|min:1',
        ]);

        $lapangan = Lapangan::findOrFail($request->id_lapangan);
        $jamSelesai = date('H:i', strtotime("{$request->jam_mulai} +{$request->jumlah_jam} hours"));

        $totalBiaya = $request->jumlah_jam * $lapangan->harga_per_jam;

        Pesanan::create([
            'id_lapangan' => $lapangan->id,
            'id_pengguna' => Auth::id(),
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $jamSelesai,
            'jumlah_jam' => $request->jumlah_jam,
            'total_biaya' => $totalBiaya,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('customer.booking')->with('success', 'Pesanan berhasil dibuat!');
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $pesanan = Pesanan::with('lapangan')->findOrFail($id);
        return view('customer.bookinglap.detail', compact('pesanan'));
    }
}
