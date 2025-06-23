<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBookingController extends Controller
{
    // Menampilkan daftar pesanan booking
    public function index(Request $request)
    {
        $query = Pesanan::with(['lapangan', 'pengguna']);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan tanggal
        if ($request->has('tanggal') && $request->tanggal != '') {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter berdasarkan lapangan
        if ($request->has('lapangan') && $request->lapangan != '') {
            $query->where('id_lapangan', $request->lapangan);
        }

        $pesanan = $query->orderBy('created_at', 'desc')->paginate(15);

        // Data untuk filter dropdown
        $statusOptions = Pesanan::getStatusOptions();
        $lapanganOptions = \App\Models\Lapangan::pluck('nama_lapangan', 'id');

        return view('admin.booking.index', compact('pesanan', 'statusOptions', 'lapanganOptions'));
    }

    // Menerima pesanan
    public function accept(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Validasi status
        if ($pesanan->status !== Pesanan::STATUS_PENDING) {
            return back()->withErrors(['error' => 'Hanya pesanan dengan status pending yang bisa diterima.']);
        }

        // Validasi bukti pembayaran
        if (!$pesanan->bukti_pembayaran) {
            return back()->withErrors(['error' => 'Pesanan belum memiliki bukti pembayaran.']);
        }

        try {
            $pesanan->update([
                'status' => Pesanan::STATUS_ACCEPTED
            ]);

            \Log::info('Booking accepted by admin', [
                'pesanan_id' => $pesanan->id,
                'admin_id' => Auth::id(),
                'customer_id' => $pesanan->id_pengguna
            ]);

            return redirect()->route('admin.booking.index')->with('success', 'Pesanan berhasil diterima.');

        } catch (\Exception $e) {
            \Log::error('Failed to accept booking', [
                'error' => $e->getMessage(),
                'pesanan_id' => $pesanan->id,
                'admin_id' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal menerima pesanan. Silakan coba lagi.']);
        }
    }

    // Menolak pesanan
    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500|min:10'
        ], [
            'alasan_penolakan.required' => 'Alasan penolakan wajib diisi.',
            'alasan_penolakan.min' => 'Alasan penolakan minimal 10 karakter.',
            'alasan_penolakan.max' => 'Alasan penolakan maksimal 500 karakter.'
        ]);

        $pesanan = Pesanan::findOrFail($id);

        // Validasi status
        if (!in_array($pesanan->status, [Pesanan::STATUS_PENDING, Pesanan::STATUS_ACCEPTED])) {
            return back()->withErrors(['error' => 'Pesanan tidak dapat ditolak.']);
        }

        try {
            $pesanan->update([
                'status' => Pesanan::STATUS_REJECTED,
                'alasan_penolakan' => $request->alasan_penolakan
            ]);

            \Log::info('Booking rejected by admin', [
                'pesanan_id' => $pesanan->id,
                'admin_id' => Auth::id(),
                'customer_id' => $pesanan->id_pengguna,
                'alasan' => $request->alasan_penolakan
            ]);

            return redirect()->route('admin.booking.index')->with('success', 'Pesanan berhasil ditolak.');

        } catch (\Exception $e) {
            \Log::error('Failed to reject booking', [
                'error' => $e->getMessage(),
                'pesanan_id' => $pesanan->id,
                'admin_id' => Auth::id()
            ]);

            return back()->withErrors(['error' => 'Gagal menolak pesanan. Silakan coba lagi.']);
        }
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $pesanan = Pesanan::with(['lapangan', 'pengguna'])->findOrFail($id);
        return view('admin.booking.show', compact('pesanan'));
    }

    // Menampilkan jadwal harian
    public function detail(Request $request)
    {
        $tanggal = $request->get('tanggal', now()->toDateString());

        // Mengambil pesanan dengan status "accepted" pada tanggal tertentu
        $pesananDiterima = Pesanan::with(['lapangan', 'pengguna'])
            ->where('status', Pesanan::STATUS_ACCEPTED)
            ->whereDate('tanggal', $tanggal)
            ->orderBy('jam')
            ->get()
            ->groupBy('id_lapangan');

        $lapangan = \App\Models\Lapangan::all();

        return view('admin.booking.detail', compact('pesananDiterima', 'lapangan', 'tanggal'));
    }

    // Dashboard statistik
    public function dashboard()
    {
        $today = now()->toDateString();
        $yesterday = now()->subDay()->toDateString();
        $thisMonth = now()->format('Y-m');

        $stats = [
            'bookings_today' => Pesanan::whereDate('created_at', $today)->count(),
            'bookings_yesterday' => Pesanan::whereDate('created_at', $yesterday)->count(),
            'revenue_today' => Pesanan::where('status', Pesanan::STATUS_ACCEPTED)
                ->whereDate('tanggal', $today)
                ->sum('total_biaya'),
            'revenue_yesterday' => Pesanan::where('status', Pesanan::STATUS_ACCEPTED)
                ->whereDate('tanggal', $yesterday)
                ->sum('total_biaya'),
            'active_courts' => \App\Models\Lapangan::where('status', 'aktif')->count(),
            'total_courts' => \App\Models\Lapangan::count(),
            'pending_bookings' => Pesanan::where('status', Pesanan::STATUS_PENDING)->count(),
            'accepted_today' => Pesanan::where('status', Pesanan::STATUS_ACCEPTED)
                ->whereDate('tanggal', $today)->count(),
            'rejected_today' => Pesanan::where('status', Pesanan::STATUS_REJECTED)
                ->whereDate('tanggal', $today)->count(),
            'total_revenue_month' => Pesanan::where('status', Pesanan::STATUS_ACCEPTED)
                ->whereYear('tanggal', now()->year)
                ->whereMonth('tanggal', now()->month)
                ->sum('total_biaya'),
        ];

        // Calculate percentage changes
        $stats['bookings_change'] = $stats['bookings_yesterday'] > 0
            ? round((($stats['bookings_today'] - $stats['bookings_yesterday']) / $stats['bookings_yesterday']) * 100, 1)
            : 0;

        $stats['revenue_change'] = $stats['revenue_yesterday'] > 0
            ? round((($stats['revenue_today'] - $stats['revenue_yesterday']) / $stats['revenue_yesterday']) * 100, 1)
            : 0;

        $recentBookings = Pesanan::with(['lapangan', 'pengguna'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.beranda', compact('stats', 'recentBookings'));
    }
}
