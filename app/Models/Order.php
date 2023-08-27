<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Model;
use App\Models\Member;
use App\Models\Produk;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $table = 'pesanan';

    protected $fillable = ['id_user','total_berat','total_amount','status', 'nomor_orderan'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_pesanan');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function getFormattedTotalAmountAttribute()
    {
        return 'Rp. ' . number_format($this->total_amount, 2, ',', '.');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM Y [pukul] HH:mm');
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pesanan');
    }
}
