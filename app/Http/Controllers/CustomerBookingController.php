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
            'nama_lengkap' => 'required|string|max:255|min:2',
            'alamat' => 'required|string|max:500|min:10',
            'no_telepon' => 'required|string|max:15|min:10|regex:/^[0-9+\-\s]+$/',
            'tanggal' => 'required|date|after:today',
            'jam' => 'required|array|min:1|max:8',
            'catatan' => 'nullable|string|max:500',
        ], [
            'tanggal.after' => 'Tanggal booking harus minimal besok.',
            'jam.max' => 'Maksimal booking 8 jam per hari.',
            'no_telepon.regex' => 'Format nomor telepon tidak valid.',
            'alamat.min' => 'Alamat minimal 10 karakter.',
        ]);

        // Validasi jam operasional
        $jamOperasional = [
            '08:00', '09:00', '10:00', '11:00', '12:00',
            '13:00', '14:00', '15:00', '16:00', '17:00',
            '18:00', '19:00', '20:00', '21:00', '22:00',
        ];

        $jamDipilih = $request->jam;
        foreach ($jamDipilih as $jam) {
            if (!in_array($jam, $jamOperasional)) {
                return back()->withErrors(['jam' => "Jam $jam tidak tersedia."]);
            }
        }

        // Cek ketersediaan jam
        $pesananPadaTanggal = Pesanan::where('id_lapangan', $request->id_lapangan)
            ->where('tanggal', $request->tanggal)
            ->whereNotIn('status', [Pesanan::STATUS_REJECTED, Pesanan::STATUS_CANCELLED])
            ->pluck('jam');

        $jamSudahDipesan = $pesananPadaTanggal->flatMap(function ($jam) {
            return explode(', ', $jam);
        })->toArray();

        foreach ($jamDipilih as $jam) {
            if (in_array($jam, $jamSudahDipesan)) {
                return back()->withInput()->withErrors(['jam' => "Jam $jam sudah dipesan. Silakan pilih jam lain."]);
            }
        }

        // Validasi jam berurutan (opsional, untuk mencegah booking terputus-putus)
        sort($jamDipilih);
        for ($i = 1; $i < count($jamDipilih); $i++) {
            $currentHour = (int) substr($jamDipilih[$i], 0, 2);
            $prevHour = (int) substr($jamDipilih[$i-1], 0, 2);

            if ($currentHour - $prevHour > 1) {
                return back()->withInput()->withErrors(['jam' => 'Jam booking harus berurutan.']);
            }
        }

        try {
            $lapangan = Lapangan::findOrFail($request->id_lapangan);
            $jumlahJam = count($jamDipilih);
            $totalBiaya = $jumlahJam * $lapangan->harga_per_jam;

            $pesanan = Pesanan::create([
                'id_lapangan' => $lapangan->id,
                'id_pengguna' => Auth::id(),
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'tanggal' => $request->tanggal,
                'jam' => implode(', ', $jamDipilih),
                'jumlah_jam' => $jumlahJam,
                'total_biaya' => $totalBiaya,
                'catatan' => $request->catatan,
                'status' => Pesanan::STATUS_PENDING,
            ]);

            // Log booking creation
            \Log::info('New booking created', [
                'pesanan_id' => $pesanan->id,
                'user_id' => Auth::id(),
                'lapangan_id' => $lapangan->id,
                'tanggal' => $request->tanggal,
                'jam' => implode(', ', $jamDipilih),
                'total_biaya' => $totalBiaya
            ]);

            return redirect()->route('customer.detailbooking', $pesanan->id)
                ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran dan upload bukti pembayaran.');

        } catch (\Exception $e) {
            \Log::error('Booking creation failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'lapangan_id' => $request->id_lapangan
            ]);

            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat membuat pesanan. Silakan coba lagi.']);
        }
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
        $pesanan = Pesanan::with(['lapangan', 'pengguna'])
            ->where('id', $id)
            ->where('id_pengguna', Auth::id()) // Pastikan user hanya bisa melihat pesanannya sendiri
            ->firstOrFail();

        return view('customer.bookinglap.detail', compact('pesanan'));
    }

    // Upload bukti pembayaran
    public function uploadPaymentProof(Request $request, $id)
    {
        $pesanan = Pesanan::where('id', $id)
            ->where('id_pengguna', Auth::id())
            ->firstOrFail();

        // Validasi hanya bisa upload jika status pending
        if ($pesanan->status !== Pesanan::STATUS_PENDING) {
            return back()->withErrors(['error' => 'Bukti pembayaran hanya bisa diupload untuk pesanan dengan status pending.']);
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'bukti_pembayaran.required' => 'Bukti pembayaran wajib diupload.',
            'bukti_pembayaran.image' => 'File harus berupa gambar.',
            'bukti_pembayaran.mimes' => 'Format gambar harus JPEG, PNG, atau JPG.',
            'bukti_pembayaran.max' => 'Ukuran file maksimal 2MB.',
        ]);

        try {
            // Hapus file lama jika ada
            if ($pesanan->bukti_pembayaran && \Storage::disk('public')->exists($pesanan->bukti_pembayaran)) {
                \Storage::disk('public')->delete($pesanan->bukti_pembayaran);
            }

            // Upload file baru
            $fileName = 'bukti_pembayaran_' . $pesanan->id . '_' . time() . '.' . $request->bukti_pembayaran->extension();
            $filePath = $request->bukti_pembayaran->storeAs('bukti_pembayaran', $fileName, 'public');

            // Update pesanan
            $pesanan->update([
                'bukti_pembayaran' => $filePath
            ]);

            \Log::info('Payment proof uploaded', [
                'pesanan_id' => $pesanan->id,
                'user_id' => Auth::id(),
                'file_path' => $filePath
            ]);

            return back()->with('success', 'Bukti pembayaran berhasil diupload. Pesanan Anda akan segera diproses.');

        } catch (\Exception $e) {
            \Log::error('Payment proof upload failed', [
                'error' => $e->getMessage(),
                'pesanan_id' => $pesanan->id,
                'user_id' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal mengupload bukti pembayaran. Silakan coba lagi.']);
        }
    }

    // Menampilkan riwayat pesanan user
    public function history()
    {
        $pesanan = Pesanan::with('lapangan')
            ->where('id_pengguna', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('customer.bookinglap.history', compact('pesanan'));
    }
}
