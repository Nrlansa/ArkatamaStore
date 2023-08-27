<?php

namespace App\Models;

use App\Models\User;
use App\Models\Model;
use App\Models\Order;
use App\Models\Kategori;
use App\Models\Keranjang;

class Produk extends Model
{
    protected $table = 'produk';

    protected $dates = ['verified_at'];
    protected $fillable = [
        'nama_produk',
        'harga',
        'berat',
        'deskripsi',
        'stok', 
    ];

    public  function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by', 'id');
    }
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 2, ',', '.');
    }
    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'id_produk');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_produk');
    }
}

