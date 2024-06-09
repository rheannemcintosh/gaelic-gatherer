<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Welcome Routes
Route::get('/', [FrontendController::class, 'displayWelcomePage'])->name('welcome');

// Research Study Routes
Route::prefix('research-study')->group(function () {
    Route::get('/', [FrontendController::class, 'displayResearchStudyInformation'])->name('research-study');
    Route::get('/download-pdf', [FrontendController::class, 'downloadParticipantInformationSheetPDF'])->name('research-study.download-pdf');
});
