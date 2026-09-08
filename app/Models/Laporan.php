<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- INI BARIS YANG HILANG TADI
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lokasi',
        'deskripsi',
        'foto_bukti',
        'status',
    ];

    // Jika kamu punya relasi ke User, biarkan tetap ada seperti di bawah ini:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}