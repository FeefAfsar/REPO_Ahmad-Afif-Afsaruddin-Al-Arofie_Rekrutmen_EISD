<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;

    protected $table = 'penugasans'; // Sesuaikan jika nama tabel di database berbeda

    protected $fillable = [
        'user_id',
        'lokasi_id',
        'shift',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(LokasiParkir::class, 'lokasi_id');
    }
}