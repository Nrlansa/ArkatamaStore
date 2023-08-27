<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Order;
use App\Models\Member;
use App\Models\Pengiriman;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
  
    protected $table = 'pembayaran';

    protected $fillable = [
        'id_pesanan',
        'id_user',
        'nomor_orderan',
        'total_pembayaran',
        'tanggal_pembayaran',
        'bukti_bayar',
    ];

   
    public function pesanan()
    {
        return $this->belongsTo(Order::class, 'id_pesanan');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_user');
    }
    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class, 'id_pembayaran');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pesanan');
    }

}
