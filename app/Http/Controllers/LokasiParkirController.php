<?php

namespace App\Http\Controllers;
use App\Models\LokasiParkir;
use Illuminate\Http\Request;

class LokasiParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hanya Admin yang boleh kelola lokasi
        $lokasis = \App\Models\LokasiParkir::all();
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini khusus Administrator.');
        }

        $lokasis = LokasiParkir::all();
        return view('lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Nampilin halaman form
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Nyimpen data ke database
        LokasiParkir::create([
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat
        ]);
        //return ke tampilan daftar lokasi
        return redirect('/lokasi-parkir');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Cari data berdasarkan Id, lalu ngirim ke view form edit
        $lokasi = LokasiParkir::findOrFail($id);
        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Cari data lama, lalu ditimpa sama data baru dari form
        $lokasi = LokasiParkir::findOrFail($id);
        $lokasi -> update([
            'nama_tempat' => $request->nama_tempat,
            'alamat' => $request->alamat
        ]);
        return redirect('/lokasi-parkir');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari data berdasarkan Id, lalu delete
        $lokasi = LokasiParkir::findOrFail($id);
        $lokasi -> delete();

        //redirect halaman table
        return redirect('/lokasi-parkir');
    }
}
