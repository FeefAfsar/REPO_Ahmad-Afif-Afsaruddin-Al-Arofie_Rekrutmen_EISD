<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penugasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke Jukir
            $table->foreignId('lokasi_id')->constrained('lokasi_parkirs')->onDelete('cascade'); // Relasi ke Lokasi Parkir (sesuaikan nama tabel lokasi jika berbeda)
            $table->string('shift'); // Pagi, Sore, atau Malam
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasans');
    }
};
