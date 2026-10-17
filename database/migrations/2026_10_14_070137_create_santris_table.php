<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('kelas');
            $table->string('rfid_uid')->unique();       // Untuk tap USB RFID Reader (Device)
            $table->string('barcode_code')->unique();  // Untuk scan barcode (SIMART)
            $table->decimal('saldo', 10, 2)->default(0); // Saldo uang saku kantin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
