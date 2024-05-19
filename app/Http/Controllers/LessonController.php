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
        $gaelicWords = [
            ['index' => 0, 'word' => '1' ],
            [ 'index' => 1, 'word' => '2' ],
            [ 'index' => 2, 'word' => '3' ],
            [ 'index' => 3, 'word' => '4' ]
        ];

        $englishWords = [
            ['index' => 0, 'word' => '1' ],
            [ 'index' => 1, 'word' => '2' ],
            [ 'index' => 2, 'word' => '3' ],
            [ 'index' => 3, 'word' => '4' ]
        ];

        shuffle($gaelicWords);
        shuffle($englishWords);

        return view('lessons.show', compact('lesson', 'gaelicWords', 'englishWords'));
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
