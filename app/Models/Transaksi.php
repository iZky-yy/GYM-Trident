<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'member_id',
        'paket_id',
        'personal_trainer_id',
        'total_bayar',
        'bukti_pembayaran',
        'status',
        'validated_by',
        'validated_at',
        'expired_at'
    ];

    public function pt()
    {
        return $this->belongsTo(PersonalTrainer::class, 'personal_trainer_id');
    }
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function paket()
    {
        return $this->belongsTo(PaketGym::class, 'paket_id');
    }
}
