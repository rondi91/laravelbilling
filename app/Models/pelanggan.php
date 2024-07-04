<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'no_telepon', 'email', 'paket_id'];

    public function paketInternet()
    {
        return $this->belongsTo(PaketInternet::class, '', '');
    }
    public function penagihans()
    {
        return $this->hasMany(Penagihan::class, 'pelanggan_id', 'pelanggan_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'pelanggan_id', 'pelanggan_id');
    }

    public function currentSubscription()
    {
        return $this->hasOne(Subscription::class, 'pelanggan_id', 'pelanggan_id')->latest('tanggal_mulai');
    }
}
