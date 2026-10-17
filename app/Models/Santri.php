<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 'nama', 'kelas', 'rfid_uid', 'barcode_code', 'saldo'
    ];

    public function peminjamanDevices()
    {
        return $this->hasMany(PeminjamanDevice::class);
    }

    public function transaksiSimarts()
    {
        return $this->hasMany(TransaksiSimart::class);
    }
}