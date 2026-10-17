<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;

class SantriSeeder extends Seeder
{
    public function run(): void
    {
        Santri::create([
            'nis' => '2026001',
            'nama' => 'Ahmad Fikri',
            'kelas' => '10 MIPA 1',
            'rfid_uid' => '1234567890',     // Contoh UID dari USB RFID Reader
            'barcode_code' => 'BARCODE-001', // Contoh kode barcode untuk SIMART
            'saldo' => 50000.00            // Saldo awal Rp 50.000
        ]);

        Santri::create([
            'nis' => '2026002',
            'nama' => 'Siti Aminah',
            'kelas' => '11 IPS 2',
            'rfid_uid' => '0987654321',     // Contoh UID kartu kedua
            'barcode_code' => 'BARCODE-002', // Contoh barcode kedua
            'saldo' => 100000.00           // Saldo awal Rp 100.000
        ]);
    }
}
