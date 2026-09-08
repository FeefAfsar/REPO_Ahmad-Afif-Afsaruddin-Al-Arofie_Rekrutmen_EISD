<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LokasiParkir;

class Penugasan_Controller extends Controller
{
    // Menampilkan form penugasan
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
        
        $jukirs = User::where('role', 'jukir')->get();
        $lokasis = LokasiParkir::all();
        
        return view('penugasan.index', compact('jukirs', 'lokasis'));
    }

    // Memproses data penugasan
    public function store(Request $request)
    {
        // 2: validate(request)
        $request->validate([
            'jukir_id' => 'required|exists:users,id',
            'lokasi_id' => 'required|exists:lokasi_parkirs,id',
            'shift' => 'required|string'
        ]);

        // 3: find(jukir_id)
        $jukir = User::findOrFail($request->jukir_id);

        // 4: attach(lokasi_id, shift)
        $jukir->lokasi_Parkirs()->attach($request->lokasi_id, ['shift' => $request->shift]);

        // 4.1.1: redirect() with success
        return redirect()->back()->with('success', 'Jukir berhasil ditugaskan ke lokasi!');
    }
}