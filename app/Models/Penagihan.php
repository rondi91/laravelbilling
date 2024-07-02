<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penagihan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'id');

    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'penagihan_id', 'penagihan_id');
    }
}
