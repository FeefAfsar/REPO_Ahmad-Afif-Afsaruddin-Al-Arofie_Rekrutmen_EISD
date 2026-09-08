<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiParkir extends Model
{
    protected $guarded = ['id'];

    public function jukirs()
    {
        return $this->belongsToMany(Users::class, 'jukir_lokasi', 'lokasi_parkir_id', 'user_id')
                    ->withPivot('shift')
                    ->withTimestamps();
    }
}
