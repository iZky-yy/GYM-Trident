<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hari',
        'jam'
    ];

    public function pt()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
