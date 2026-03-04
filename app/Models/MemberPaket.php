<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberPaket extends Model
{
    public function member()
    {
        return $this->belongsTo(User::class,'member_id');
    }
    
    public function paket()
    {
        return $this->belongsTo(PaketGym::class,'paket_id');
    }
}
