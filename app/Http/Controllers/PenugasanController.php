<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LokasiParkir;
use App\Models\Penugasan; // Pastikan Model Penugasan sudah ada

class PenugasanController extends Controller
{
    public function index()
    {
        // Mengambil semua data penugasan beserta relasi user dan lokasi
        $penugasans = Penugasan::with(['user', 'lokasi'])->get();

        return view('penugasan.index', compact('penugasans'));
    }

    public function create()
    {
        $jukirs = User::where('role', 'jukir')->get();
        $lokasis = LokasiParkir::all();

        return view('penugasan.create', compact('jukirs', 'lokasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required',
            'lokasi_id' => 'required',
            'shift'     => 'required',
        ]);

        // Simpan ke database
        Penugasan::create([
            'user_id'   => $request->user_id,
            'lokasi_id' => $request->lokasi_id,
            'shift'     => $request->shift,
        ]);

        return redirect('/penugasan')->with('success', 'Penugasan jukir berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        // Cari dan hapus data penugasan berdasarkan ID
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->delete();

        return redirect('/penugasan')->with('success', 'Penugasan berhasil dicabut!');
    }
}