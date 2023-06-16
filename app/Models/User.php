<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    
    protected $fillable = [
        'nama',
        'username',
        'nama',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
