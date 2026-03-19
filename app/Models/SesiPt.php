<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesiPt extends Model
{
    protected $fillable = [
        'membership_id',
        'member_id',
        'pt_id',
        'tanggal',
        'jam',
        'status'
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function pt()
    {
        return $this->belongsTo(User::class, 'pt_id');
    }
}
