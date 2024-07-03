<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    private $guarded =[];


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(PaketInternet::class, 'id', 'id');
    }
}
