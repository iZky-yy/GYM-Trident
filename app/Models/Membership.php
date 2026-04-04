<?php

namespace App\Models;

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
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($membership) {

            $membership->tanggal_mulai = now();

            $paket = PaketGym::find($membership->paket_id);

            if ($paket) {
                $membership->tanggal_akhir = now()->addDays($paket->durasi_hari);
            }
        });
    }

    // RELATION
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
}
