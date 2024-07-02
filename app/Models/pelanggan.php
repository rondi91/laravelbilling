<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'alamat', 'telepon', 'email', 'paket_id'];

    public function paketInternet()
    {
        return $this->belongsTo(PaketInternet::class, '', '');
    }
}
