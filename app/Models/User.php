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
        'qr_token',
        'qr_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'birthday'          => 'date',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (User $user) {
            $user->qr_token ??= Str::uuid()->toString();
        });
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'member_id');
    }

    public function activeMembership()
    {
        return $this->hasOne(Membership::class, 'member_id')
            ->where('status', 'active')
            ->latest();
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'member_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function personalTrainer()
    {
        return $this->hasOne(PersonalTrainer::class);
    }

    public function isMember(): bool
    {
        return $this->role === 'member';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
