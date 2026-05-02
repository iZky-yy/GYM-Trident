<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Models\ExerciseMedia;

class ExerciseController extends Controller
{
    public function muscles()
    {
        $muscles = [
            ['name' => 'chest', 'image' => 'chest.png'],
            ['name' => 'back', 'image' => 'back.png'],
            ['name' => 'legs', 'image' => 'legs.png'],
            ['name' => 'shoulder', 'image' => 'shoulder.png'],
            ['name' => 'biceps', 'image' => 'biceps.png'],
            ['name' => 'triceps', 'image' => 'triceps.png'],
        ];

        return view('exercises.muscles', compact('muscles'));
    }

    public function byMuscle($muscle)
    {
        $exercises = Exercise::with('media')
            ->where('muscle_group', $muscle)
            ->get();

        return view('exercises.index', compact('exercises', 'muscle'));
    }

    public function create()
    {
        return view('admin.exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'muscle_group' => 'required',
            'description' => 'nullable',
            'youtube' => 'nullable',
            'image' => 'nullable|image'
        ]);

        $exercise = Exercise::create([
            'name' => $request->name,
            'muscle_group' => $request->muscle_group,
            'description' => $request->description,
        ]);

        // VIDEO
        if ($request->youtube) {
            preg_match('/v=([^&]+)/', $request->youtube, $matches);
            $youtubeId = $matches[1] ?? $request->youtube;

            ExerciseMedia::create([
                'exercise_id' => $exercise->id,
                'type' => 'video',
                'url' => $youtubeId
            ]);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('exercises', 'public');

            ExerciseMedia::create([
                'exercise_id' => $exercise->id,
                'type' => 'image',
                'url' => '/storage/' . $path
            ]);
        }

        return redirect()->route('muscles.index')->with('success', 'Berhasil ditambahkan!');
    }
}
