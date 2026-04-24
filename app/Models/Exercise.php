<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'difficulty'
    ];

    public function media()
    {
        return $this->hasMany(ExerciseMedia::class);
    }
}
