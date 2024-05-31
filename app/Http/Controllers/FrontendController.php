<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display the welcome page.
     */
    public function displayWelcomePage()
    {
        return view('welcome');
    }

    /**
     * Display the research study page.
     */
    public function displayResearchStudyInformation()
    {
        return view('research-study');
    }

    /**
     * Download the participant information sheet PDF.
     */
    public function downloadParticipantInformationSheetPDF()
    {
        $filePath = storage_path('app/public/participant-information-sheet.pdf');

        return response()->download($filePath);
    }
}
