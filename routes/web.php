<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiParkirController;

Route::get('/', function () { return view('welcome'); });
Route::resource('lokasi-parkir', LokasiParkirController::class);
Route::resource('laporan', LaporanController::class);
Route::get('/lokasi-parkir', [LokasiParkirController::class, 'index']);
Route::get('/lokasi-parkir/create', [LokasiParkirController::class, 'create']);
Route::post('/lokasi-parkir', [LokasiParkirController::class, 'store']);
Route::delete('/lokasi-parkir/{id}', [LokasiParkirController::class, 'destroy']);
// Nampilin form edit yang sudah terisi data lama
Route::get('/lokasi-parkir/{id}/edit', [LokasiParkirController::class, 'edit']);
// Memproses perubahan data ke database
Route::put('/lokasi-parkir/{id}', [LokasiParkirController::class, 'update']);