<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Menampilkan daftar pesanan booking
    public function index()
    {
        $pesanan = Pesanan::with('lapangan')->orderBy('created_at', 'desc')->get();
        return view('admin.booking.index', compact('pesanan'));
    }

    // Menerima pesanan
    public function accept($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => 'accepted']);

        return redirect()->route('admin.booking.index')->with('success', 'Pesanan berhasil diterima.');
    }

    // Menolak pesanan
    public function reject($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => 'rejected']);

        return redirect()->route('admin.booking.index')->with('success', 'Pesanan berhasil ditolak.');
    }

    public function detail()
{
    // Mengambil pesanan dengan status "accepted" dan mengelompokkan berdasarkan hari
    $pesananDiterima = Pesanan::where('status', 'accepted')
        ->orderBy('tanggal')
        ->get()
        ->groupBy('tanggal'); // Mengelompokkan berdasarkan tanggal

    return view('admin.booking.detail', compact('pesananDiterima'));
}

}
