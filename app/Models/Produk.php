<?php

namespace App\Models;

use App\Models\User;
use App\Models\Model;
use App\Models\Kategori;

class Produk extends Model
{
    protected $table = 'produk';

    protected $dates = ['verified_at'];


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
}

