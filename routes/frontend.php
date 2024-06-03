<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

    // Welcome Routes
    Route::get('/', [FrontendController::class, 'displayWelcomePage'])->name('welcome');

    // Research Study Routes
    Route::prefix('research-study')->group(function () {
        Route::get('/', [FrontendController::class, 'displayResearchStudyInformation'])->name('research-study');
        Route::get('/download-pdf', [FrontendController::class, 'downloadParticipantInformationSheetPDF'])->name('research-study.download-pdf');
    });

    Route::get('/privacy-policy', function () {
        return view('pages.privacy-policy');
    })->name('privacy-policy');

