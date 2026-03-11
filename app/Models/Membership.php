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
        'sisa_kunjungan',
        'status'
    ];

    // relasi ke member (users)
    public function member()
    {
        return $this->belongsTo(User::class,'member_id');
    }

    // relasi ke paket gym
    public function paket()
    {
        return $this->belongsTo(PaketGym::class,'paket_id');
    }

    // relasi ke personal trainer
    public function pt()
    {
        return $this->belongsTo(PersonalTrainer::class,'personal_trainer_id');
    }
}
