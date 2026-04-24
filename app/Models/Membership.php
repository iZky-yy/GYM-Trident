<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'paket_id',
        'personal_trainer_id',
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Membership $membership) {
            $membership->tanggal_mulai = $membership->tanggal_mulai ?? now();

            $paket = PaketGym::find($membership->paket_id);

            if ($paket) {
                $membership->tanggal_akhir = Carbon::parse($membership->tanggal_mulai)
                    ->addDays($paket->durasi_hari);
            }
        });
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function paket()
    {
        return $this->belongsTo(PaketGym::class, 'paket_id');
    }

    public function pt()
    {
        return $this->belongsTo(PersonalTrainer::class, 'personal_trainer_id');
    }

    public function isActive(): bool
    {
        return $this->status === 'active' && $this->tanggal_akhir?->isFuture();
    }
}
