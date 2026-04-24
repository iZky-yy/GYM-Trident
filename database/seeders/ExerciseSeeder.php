<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\ExerciseMedia;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ex = Exercise::create([
            'name' => 'Bench Press',
            'description' => 'Latihan untuk dada',
            'muscle_group' => 'Chest',
            'difficulty' => 'Beginner'
        ]);

        ExerciseMedia::create([
            'exercise_id' => $ex->id,
            'type' => 'video',
            'url' => 'rT7DgCr-3pg'
        ]);

        ExerciseMedia::create([
            'exercise_id' => $ex->id,
            'type' => 'image',
            'url' => 'https://via.placeholder.com/400'
        ]);
    }
}
