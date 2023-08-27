<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Pembayaran;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
        'id_pembayaran',
        'nomor_orderan',
        'status_pengiriman',
        'tanggal_pengiriman',
        'nomor_resi',
    ];
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
