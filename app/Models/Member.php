<?php

namespace App\Models;


use App\Models\Order;

use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends  Authenticatable
{
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->id = (string) Str::orderedUuid();
        });
    }

    protected $table = 'members';

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class, 'id_user');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_user');
    }
}
