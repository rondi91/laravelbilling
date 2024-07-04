<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketInternet extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'id';
    protected $fillable = ['nama_paket', 'kecepatan', 'harga'];

    public function pelanggans()
    {
        return $this->hasMany(Pelanggan::class, 'id', 'id');
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'paket_id', 'paket_id');
    }
}
