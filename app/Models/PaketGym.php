<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketGym extends Model
{
    protected $fillable = [
        'nama_paket',
        'durasi_hari',
        'harga',
    ];

    public function members()
    {
        return $this->hasMany(MemberPaket::class,'paket_id');
    }
}
