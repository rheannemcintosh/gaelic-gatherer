<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $unitSlug, Lesson $lesson)
    {
        auth()->user()->lessons()->updateExistingPivot($lesson, ['number_of_starts' => auth()->user()->lessons()->where('lesson_id', $lesson->id)->first()->pivot->number_of_starts + 1]);

        if ($lesson->lessonType->name == 'Overview') {
            return view('lessons.show', compact('lesson'));
        }

        $columnOneWords = [];
        $columnTwoWords = [];
        $columnOneName = '';
        $columnTwoName = '';
        $name = '';

        if ($lesson->lessonType->name == 'Icon') {
            $columnOneWords = [
                ['index' => 0, 'word' => 'Sunny'],
                ['index' => 1, 'word' => 'Rainy'],
                ['index' => 2, 'word' => 'Foggy'],
                ['index' => 3, 'word' => 'Snowy']
            ];
            $columnTwoWords = [
                ['index' => 0, 'word' => 'Grianach'],
                ['index' => 1, 'word' => 'Fliuch'],
                ['index' => 2, 'word' => 'Ceòthach'],
                ['index' => 3, 'word' => 'Sneachda']
            ];
            $name = 'weather';
            $columnOneName = 'Weather Icons';
            $columnTwoName = 'Gaelic Translations';
        }

        switch ($lesson->name) {
            case 'Matching Greetings':
                $columnOneWords = [
                    ['index' => 0, 'word' => 'Fàilte'],
                    ['index' => 1, 'word' => 'Halò'],
                    ['index' => 2, 'word' => 'Mar Sin Leat'],
                    ['index' => 3, 'word' => 'Tapadh Leibh']
                ];
                $columnTwoWords = [
                    ['index' => 0, 'word' => 'Welcome'],
                    ['index' => 1, 'word' => 'Hello'],
                    ['index' => 2, 'word' => 'Goodbye'],
                    ['index' => 3, 'word' => 'Thank You']
                ];
                $name = 'greetings';
                break;
            case 'Matching Places':
                $columnOneWords = [
                    ['index' => 0, 'word' => 'Alba'],
                    ['index' => 1, 'word' => 'Tha mi à Obar Dheathain'],
                    ['index' => 2, 'word' => 'Glaschu'],
                    ['index' => 3, 'word' => 'Sasainn']
                ];
                $columnTwoWords = [
                    ['index' => 0, 'word' => 'Scotland'],
                    ['index' => 1, 'word' => 'I am from Aberdeen'],
                    ['index' => 2, 'word' => 'Glasgow'],
                    ['index' => 3, 'word' => 'England']
                ];
                $name = 'places';
                break;
            case 'Matching Food & Drink':
                $columnOneWords = [
                    ['index' => 0, 'word' => 'Is toil leam Bradan'],
                    ['index' => 1, 'word' => 'Uisge-Beatha'],
                    ['index' => 2, 'word' => 'Cha toil leam cofaidh'],
                    ['index' => 3, 'word' => 'Aran']
                ];
                $columnTwoWords = [
                    ['index' => 0, 'word' => 'I like salmon'],
                    ['index' => 1, 'word' => 'Whisky'],
                    ['index' => 2, 'word' => 'I don\'t like coffee'],
                    ['index' => 3, 'word' => 'Bread']
                ];
                $name = 'food & drink';
                break;
            case 'Matching Weather':
                $columnOneWords = [
                    ['index' => 0, 'word' => 'Tha i teth'],
                    ['index' => 1, 'word' => 'Chan eil e grianach'],
                    ['index' => 2, 'word' => 'Reòiteach agus gaothach'],
                    ['index' => 3, 'word' => 'Fliuch']
                ];
                $columnTwoWords = [
                    ['index' => 0, 'word' => 'It is hot'],
                    ['index' => 1, 'word' => 'It is not sunny'],
                    ['index' => 2, 'word' => 'Freezing and windy'],
                    ['index' => 3, 'word' => 'Rainy']
                ];
                $name = 'weather';
                break;
            case 'Matching Numbers':
                $columnOneWords = [
                    ['index' => 0, 'word' => 'Ocht'],
                    ['index' => 1, 'word' => 'Dà'],
                    ['index' => 2, 'word' => 'Deich'],
                    ['index' => 3, 'word' => 'Aon']
                ];
                $columnTwoWords = [
                    ['index' => 0, 'word' => 'Eight'],
                    ['index' => 1, 'word' => 'Two'],
                    ['index' => 2, 'word' => 'Ten'],
                    ['index' => 3, 'word' => 'One']
                ];
                $name = 'numbers';
                break;
            default:
                break;
        }

        shuffle($columnOneWords);
        shuffle($columnTwoWords);

        return view('lessons.show', compact('lesson', 'columnOneWords', 'columnTwoWords', 'name', 'columnOneName', 'columnTwoName'));
    }
}
