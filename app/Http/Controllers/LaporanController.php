<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\LokasiParkir;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        $lokasi = LokasiParkir::all();
        return view('laporan.create', compact('lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'deskripsi' => 'required',
        ]);

        \App\Models\Laporan::create([
            'nama_lokasi' => $request->nama_lokasi,
            'deskripsi' => $request->deskripsi,
            'status' => 'PENDING',
            'user_id' => auth()->id(), // <-- KUNCI UTAMANYA DI SINI
        ]);

        return redirect('/laporan')->with('success', 'Laporan berhasil dikirim!');
    }

    public function edit(Laporan $laporan)
    {
        // Gembok keamanan: Hanya admin yang boleh mengakses halaman edit/verifikasi
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action. Hanya Admin yang dapat memverifikasi laporan.');
        }

        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Logika update status laporan yang sudah ada...
        $request->validate([
            'status' => 'required|string'
        ]);

        $laporan->update([
            'status' => $request->status
        ]);

        return redirect()->route('laporan.index')->with('success', 'Status laporan berhasil diperbarui oleh Admin.');
    }

    public function destroy($id)
    {
        Laporan::findOrFail($id)->delete();
        return redirect('/laporan');
    }
}