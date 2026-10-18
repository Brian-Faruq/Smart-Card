<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'status',
        'waktu_ambil',
        'waktu_kembali',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}