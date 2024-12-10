<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangan'));
    }    

    public function create()
    {
        return view('admin.lapangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lapangan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga_per_jam' => 'required|numeric',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('lapangan', 'public');
        }

        Lapangan::create($validated);
        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $lapangan = Lapangan::findOrFail($id);
        return view('admin.lapangan.edit', compact('lapangan'));
    }

    public function update(Request $request, $id)
    {
        $lapangan = Lapangan::findOrFail($id);

        $validated = $request->validate([
            'nama_lapangan' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga_per_jam' => 'required|numeric',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($lapangan->foto) {
                Storage::delete('public/' . $lapangan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('lapangan', 'public');
        }

        $lapangan->update($validated);
        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil diper barui.');
    }

    public function destroy($id)
    {
        $lapangan = Lapangan::findOrFail($id);

        if ($lapangan->foto) {
            Storage::delete('public/' . $lapangan->foto);
        }

        $lapangan->delete();
        return redirect()->route('lapangan.index')->with('success', 'Lapangan berhasil dihapus.');
    }
}