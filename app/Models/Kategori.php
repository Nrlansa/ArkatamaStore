<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Produk;


class Kategori extends Model
{
    protected $table = 'kategori';

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}

