<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\PeminjamanDevice;
use App\Models\TransaksiSimart;

class SmartCardController extends Controller
{
    // Halaman Landing (Pilih Layanan)
    public function landing()
    {
        return view('smart-card.landing');
    }

    // Tampilkan Form Login
    public function showLoginForm($type)
    {
        if (!in_array($type, ['device', 'simart'])) {
            return redirect()->route('landing');
        }

        return view('smart-card.login', compact('type'));
    }

    // Proses Login Dummy
    public function processLogin(Request $request, $type)
    {
        $request->validate([
            'password' => 'required'
        ]);

        // Password dummy untuk masing-masing mode
        $passwords = [
            'device' => 'device123',
            'simart' => 'simart123'
        ];

        if (isset($passwords[$type]) && $request->password === $passwords[$type]) {
            session(['auth_mode' => $type]);
            return redirect()->route('transaksi.' . $type);
        }

        return back()->with('error', 'Password salah! Silakan coba lagi.');
    }

    // Logout / Kembali ke Landing
    public function logout()
    {
        session()->forget('auth_mode');
        return redirect()->route('landing');
    }

    // Halaman Khusus Peminjaman Device
    public function devicePage()
    {
        if (session('auth_mode') !== 'device') {
            return redirect()->route('login.form', 'device')->with('error', 'Silakan login terlebih dahulu!');
        }
        return view('smart-card.device');
    }

    // Halaman Khusus Kasir SIMART
    public function simartPage()
    {
        if (session('auth_mode') !== 'simart') {
            return redirect()->route('login.form', 'simart')->with('error', 'Silakan login terlebih dahulu!');
        }
        return view('smart-card.simart');
    }

    // Memproses Tap RFID
    public function processRfid(Request $request)
    {
        $request->validate(['rfid_uid' => 'required']);

        $santri = Santri::where('rfid_uid', $request->rfid_uid)->first();

        if (!$santri) {
            return back()->with('error', 'Kartu RFID tidak dikenali atau belum terdaftar!');
        }

        PeminjamanDevice::create([
            'santri_id' => $santri->id,
            'status' => 'dipinjam',
            'waktu_ambil' => now(),
        ]);

        return back()->with('success', 'Berhasil! Device dipinjam oleh: ' . $santri->nama . ' (' . $santri->kelas . ')');
    }

    // Memproses Scan Barcode
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

        if ($santri->saldo < $request->total_belanja) {
            return back()->with('error', 'Transaksi gagal! Saldo santri tidak mencukupi.');
        }

        $santri->saldo -= $request->total_belanja;
        $santri->save();

        TransaksiSimart::create([
            'santri_id' => $santri->id,
            'total_belanja' => $request->total_belanja,
            'keterangan' => 'Belanja di Kantin SIMART'
        ]);

        return back()->with('success', 'Transaksi SIMART berhasil! Sisa saldo ' . $santri->nama . ': Rp ' . number_format($santri->saldo, 0, ',', '.'));
    }

    // Menampilkan halaman registrasi device/rfid
    public function registerDevicePage()
    {
        if (session('auth_mode') !== 'device') {
            return redirect()->route('login.form', 'device')->with('error', 'Silakan login terlebih dahulu!');
        }
        $santris = Santri::all();
        return view('smart-card.register-device', compact('santris'));
    }

    // Menyimpan registrasi RFID ke Santri
    public function storeDevice(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'rfid_uid' => 'required|unique:santris,rfid_uid'
        ]);

        $santri = Santri::findOrFail($request->santri_id);
        $santri->rfid_uid = $request->rfid_uid;
        $santri->save();

        return back()->with('success', 'Berhasil mendaftarkan RFID untuk santri: ' . $santri->nama);
    }

    // Menampilkan halaman registrasi barcode simart
    public function registerSimartPage()
    {
        if (session('auth_mode') !== 'simart') {
            return redirect()->route('login.form', 'simart')->with('error', 'Silakan login terlebih dahulu!');
        }
        $santris = Santri::all();
        return view('smart-card.register-simart', compact('santris'));
    }

    // Menyimpan registrasi Barcode ke Santri
    public function storeSimart(Request $request)
    {
        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'barcode_code' => 'required|unique:santris,barcode_code'
        ]);

        $santri = Santri::findOrFail($request->santri_id);
        $santri->barcode_code = $request->barcode_code;
        $santri->save();

        return back()->with('success', 'Berhasil mendaftarkan Barcode untuk santri: ' . $santri->nama);
    }
}