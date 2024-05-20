<?php

namespace App\Http\Controllers;

class StudyController extends Controller
{
    // Show the welcome page to research participants
    public function showWelconePage()
    {
        return view('pages.welcome');
    }

}
