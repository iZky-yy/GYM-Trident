<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PaketGym;

class MemberPaket extends Model
{
    protected $fillable = [
        'member_id',
        'paket_id',
        'pt_id',
        'tanggal_mulai',
        'tanggal_akhir'
    ];

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
        return $this->belongsTo(User::class, 'pt_id');
    }
}
