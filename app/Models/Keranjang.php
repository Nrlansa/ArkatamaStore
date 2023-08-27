<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Member;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['id_user', 'id_produk', 'jumlah'];
    
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function getPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 2, ',', '.');
    }
}
