<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Produk;
use App\Models\Keranjang;


class Kategori extends Model
{
    protected $table = 'kategori';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
    public function keranjang()
    {
        return $this->hasManyThrough(Keranjang::class, Produk::class, 'id_kategori', 'id_produk', 'id', 'id');
    }
}

