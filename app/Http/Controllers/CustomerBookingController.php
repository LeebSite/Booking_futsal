<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerBookingController extends Controller
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
        $tanggalDipilih = $request->query('tanggal', now()->toDateString());
    
        $pesananPadaTanggal = Pesanan::where('id_lapangan', $id)
            ->where('tanggal', $tanggalDipilih)
            ->pluck('jam');
    
        $jamOperasional = [
            '08:00', '09:00', '10:00', '11:00', '12:00',
            '13:00', '14:00', '15:00', '16:00', '17:00',
            '18:00', '19:00', '20:00', '21:00', '22:00',
        ];
    
        $jamTersedia = array_diff($jamOperasional, $pesananPadaTanggal->flatMap(function ($jam) {
            return explode(', ', $jam);
        })->toArray());
    
        return view('customer.bookinglap.create', compact('lapangan', 'jamTersedia', 'tanggalDipilih'));
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

        $pesananPadaTanggal = Pesanan::where('id_lapangan', $request->id_lapangan)
            ->where('tanggal', $request->tanggal)
            ->pluck('jam');

        $jamSudahDipesan = $pesananPadaTanggal->flatMap(function ($jam) {
            return explode(', ', $jam);
        })->toArray();

        $jamDipilih = $request->jam;
        foreach ($jamDipilih as $jam) {
            if (in_array($jam, $jamSudahDipesan)) {
                return back()->withErrors(['jam' => "Jam $jam sudah dipesan. Silakan pilih jam lain."]);
            }
        }

        $lapangan = Lapangan::findOrFail($request->id_lapangan);
        $jumlahJam = count($jamDipilih);
        $totalBiaya = $jumlahJam * $lapangan->harga_per_jam;

        $pesanan = Pesanan::create([
            'id_lapangan' => $lapangan->id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'tanggal' => $request->tanggal,
            'jam' => implode(', ', $jamDipilih),
            'jumlah_jam' => $jumlahJam,
            'total_biaya' => $totalBiaya,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.detailbooking', $pesanan->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    // Membatalkan pesanan
    public function cancel($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('customer.bookinglap')->with('success', 'Pesanan berhasil dibatalkan.');
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $pesanan = Pesanan::with('lapangan')->findOrFail($id);
        return view('customer.bookinglap.detail', compact('pesanan'));
    }
}
