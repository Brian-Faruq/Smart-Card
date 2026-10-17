<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\PeminjamanDevice;
use App\Models\TransaksiSimart;

class SmartCardController extends Controller
{
    // Menampilkan halaman utama simulasi
    public function index()
    {
        return view('smart-card.index');
    }

    // Memproses Tap RFID (untuk Peminjaman Device)
    public function processRfid(Request $request)
    {
        $request->validate([
            'rfid_uid' => 'required'
        ]);

        $santri = Santri::where('rfid_uid', $request->rfid_uid)->first();

        if (!$santri) {
            return back()->with('error', 'Kartu RFID tidak dikenali atau belum terdaftar!');
        }

        // Catat log peminjaman device
        PeminjamanDevice::create([
            'santri_id' => $santri->id,
            'status' => 'dipinjam',
            'waktu_ambil' => now(),
        ]);

        return back()->with('success', 'Berhasil! Device dipinjam oleh: ' . $santri->nama . ' (' . $santri->kelas . ')');
    }

    // Memproses Scan Barcode (untuk Kasir SIMART)
    public function processBarcode(Request $request)
    {
        $request->validate([
            'barcode_code' => 'required',
            'total_belanja' => 'required|numeric|min:1000'
        ]);

        $santri = Santri::where('barcode_code', $request->barcode_code)->first();

        if (!$santri) {
            return back()->with('error', 'Barcode santri tidak valid!');
        }

        // Cek saldo cukup atau tidak
        if ($santri->saldo < $request->total_belanja) {
            return back()->with('error', 'Transaksi gagal! Saldo santri tidak mencukupi.');
        }

        // Kurangi saldo santri
        $santri->saldo -= $request->total_belanja;
        $santri->save();

        // Catat transaksi kantin
        TransaksiSimart::create([
            'santri_id' => $santri->id,
            'total_belanja' => $request->total_belanja,
            'keterangan' => 'Belanja di Kantin SIMART'
        ]);

        return back()->with('success', 'Transaksi SIMART berhasil! Sisa saldo ' . $santri->nama . ': Rp ' . number_format($santri->saldo, 0, ',', '.'));
    }
}
