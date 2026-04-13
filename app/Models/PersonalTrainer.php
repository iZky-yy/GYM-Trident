<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalTrainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'spesialisasi',
        'tarif_per_sesi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class, 'personal_trainer_id');
    }
}
