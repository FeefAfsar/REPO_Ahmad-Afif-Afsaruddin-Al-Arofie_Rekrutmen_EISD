<?php

namespace App\Http\Controllers;

use App\Models\LokasiParkir;
use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        $lokasis = LokasiParkir::all();
        return view('laporan.create', compact('lokasis'));
    }

    public function store(Request $request)
    {
        // 1. Validasi inputan (termasuk validasi file gambar)
        $validatedData = $request->validate([
            'nama_lokasi' => 'required|string',
            'deskripsi'   => 'required|string',
            'foto_bukti'  => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB
        ]);

        $fotoPath = null;

        // 2. Jika user mengunggah foto, simpan ke folder storage/app/public/bukti_laporan
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti_laporan', 'public');
        }

        // 3. Simpan data ke database
        Laporan::create([
            'user_id'     => auth()->id(), // Mencatat siapa yang melapor
            'nama_lokasi' => $validatedData['nama_lokasi'],
            'deskripsi'   => $validatedData['deskripsi'],
            'foto_bukti'  => $fotoPath, // Path foto disimpan ke database
            'status'      => 'PENDING'
        ]);

        return redirect('/warga/dashboard')->with('success', 'Laporan berhasil dikirim! Terima kasih atas partisipasi Anda.');
    }
        public function edit($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
        $laporan = \App\Models\Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan')); // sesuaikan dengan view edit yang kamu miliki
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
        $laporan = \App\Models\Laporan::findOrFail($id);
        $laporan->update($request->only(['status'])); // atau field lain yang diizinkan admin
        return redirect('/laporan')->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses khusus admin.');
        }
        $laporan = \App\Models\Laporan::findOrFail($id);
        $laporan->delete();
        return redirect('/laporan')->with('success', 'Laporan berhasil dihapus!');
    }
}