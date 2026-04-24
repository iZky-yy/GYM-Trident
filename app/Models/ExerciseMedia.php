<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseMedia extends Model
{
    protected $table = 'exercise_media';

    protected $fillable = [
        'exercise_id',
        'type',
        'url'
    ];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
