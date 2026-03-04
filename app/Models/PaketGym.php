<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketGym extends Model
{
    public function members()
    {
        return $this->hasMany(MemberPaket::class,'paket_id');
    }
}
