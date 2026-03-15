<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'birthday',
        'photo',
        'qr_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date'
        ];
    }

    /**
     * Auto generate QR token saat user dibuat
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->qr_token = Str::uuid();
        });
    }

    // ======================
    // RELATIONSHIPS
    // ======================

    public function memberships()
    {
        return $this->hasMany(MemberPaket::class, 'member_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'member_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    public function paketMembers()
    {
        return $this->hasMany(MemberPaket::class, 'member_id');
    }

    public function ptMembers()
    {
        return $this->hasMany(MemberPaket::class, 'pt_id');
    }
}
