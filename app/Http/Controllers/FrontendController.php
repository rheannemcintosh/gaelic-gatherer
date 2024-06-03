<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display the welcome page.
     */
    public function displayWelcomePage()
    {
        if (Auth::check()) {
            return redirect(route('overview.show'));
        }

        return view('welcome');
    }

    /**
     * Display the research study page.
     */
    public function displayResearchStudyInformation()
    {
        if (Auth::check()) {
            return redirect(route('overview.show'));
        }

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
