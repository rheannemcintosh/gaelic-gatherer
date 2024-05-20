<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $unitSlug, Lesson $lesson)
    {
        if ($lesson->lessonType->name != 'Matching') {
            return view('lessons.show', compact('lesson'));
        }

        $gaelicWords = [];
        $englishWords = [];
        $name = '';

        switch ($lesson->name) {
            case 'Match Greetings':
                $gaelicWords = [
                    ['index' => 0, 'word' => 'Fàilte'],
                    ['index' => 1, 'word' => 'Halò'],
                    ['index' => 2, 'word' => 'Mar Sin Leat'],
                    ['index' => 3, 'word' => 'Tapadh Leibh']
                ];
                $englishWords = [
                    ['index' => 0, 'word' => 'Welcome'],
                    ['index' => 1, 'word' => 'Hello'],
                    ['index' => 2, 'word' => 'Goodbye'],
                    ['index' => 3, 'word' => 'Thank You']
                ];
                $name = 'greetings';
                break;
            case 'Match Places':
                $gaelicWords = [
                    ['index' => 0, 'word' => 'Alba'],
                    ['index' => 1, 'word' => 'Tha mi à Obar Dheathain'],
                    ['index' => 2, 'word' => 'Glaschu'],
                    ['index' => 3, 'word' => 'Sasainn']
                ];
                $englishWords = [
                    ['index' => 0, 'word' => 'Scotland'],
                    ['index' => 1, 'word' => 'I am from Aberdeen'],
                    ['index' => 2, 'word' => 'Glasgow'],
                    ['index' => 3, 'word' => 'England']
                ];
                $name = 'places';
                break;
            default:
                break;
        }

        shuffle($gaelicWords);
        shuffle($englishWords);

        return view('lessons.show', compact('lesson', 'gaelicWords', 'englishWords', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
