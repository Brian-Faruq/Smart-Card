<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSimart extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'total_belanja',
        'keterangan',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}