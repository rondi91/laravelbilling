<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerubahanPaket extends Model
{
    use HasFactory;

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'id');
    }

    public function paketSebelum()
    {
        return $this->belongsTo(PaketInternet::class, 'id_paket_sebelum', 'id_paket');
    }

    public function paketSesudah()
    {
        return $this->belongsTo(PaketInternet::class, 'id_paket_sesudah', 'id_paket');
    }
}
