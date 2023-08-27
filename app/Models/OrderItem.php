<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    protected $table = 'itempesanan';
    protected $foreignKey = 'id_pesanan';
    protected $fillable = ['id_pesanan','id_produk','kuantiti','harga'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_pesanan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
