<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiParkirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Penugasan_Controller;

// Halaman Utama Publik - Langsung lempar ke login jika belum auth
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

// Pintu Masuk / Router Utama Berdasarkan Role Setelah Login
Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->role === 'admin') {
        return redirect('/lokasi-parkir');
    } elseif ($user->role === 'jukir') {
        return redirect('/jadwal-jukir');
    } else {
        return redirect('/warga/dashboard');
    }
})->middleware(['auth'])->name('dashboard');

// Rute Universal yang Butuh Login (Profil & Laporan)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Fitur Laporan bisa diakses semua role
    Route::resource('laporan', LaporanController::class);
});

// ROUTE KHUSUS ADMIN
Route::middleware(['auth'])->group(function () {
    Route::resource('lokasi-parkir', LokasiParkirController::class);
    
    Route::get('/penugasan', [Penugasan_Controller::class, 'index']);
    Route::post('/penugasan', [Penugasan_Controller::class, 'store']);
});

// ROUTE KHUSUS JUKIR
Route::middleware(['auth'])->group(function () {
    Route::get('/jadwal-jukir', function() {
        $user = auth()->user();
        if ($user->role !== 'jukir') {
            abort(403, 'Akses ditolak.');
        }
        // Panggil relasi lokasiParkirs()
        $penugasannya = $user->lokasiParkirs; 
        return view('jukir.jadwal', compact('penugasannya'));
    });
});

// ROUTE KHUSUS WARGA / USER
Route::middleware(['auth'])->group(function () {
    Route::get('/warga/dashboard', function() {
        $user = auth()->user();
        if ($user->role !== 'user') {
            abort(403, 'Akses ditolak. Halaman ini khusus Warga.');
        }
        $laporanSaya = \App\Models\Laporan::where('user_id', $user->id)->get();
        return view('warga.dashboard', compact('user', 'laporanSaya'));
    });

    Route::post('/warga/aktivasi', function() {
        $user = auth()->user();
        if ($user->role !== 'user') {
            abort(403);
        }
        $user->update(['status_retribusi' => true]);
        return redirect()->back()->with('success', 'Status Bebas Parkir berhasil diaktifkan!');
    });
});

require __DIR__.'/auth.php';