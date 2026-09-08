<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'status_retribusi'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status_retribusi' => 'boolean',
        ];
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function lokasiParkirs()
    {
        return $this->belongsToMany(LokasiParkir::class, 'jukir_lokasi', 'user_id', 'lokasi_parkir_id')
                    ->withPivot('shift')
                    ->withTimestamps();
    }

    // Alias untuk menjaga kompatibilitas pemanggilan lama jika ada yang menggunakan format snake_case
    public function lokasi_Parkirs()
    {
        return $this->lokasiParkirs();
    }
}