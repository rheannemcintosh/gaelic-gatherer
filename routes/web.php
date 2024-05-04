<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostStudyQuestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/overview', [UnitController::class, 'index'])->name('units.index');
    Route::get('/units/{slug}', [UnitController::class, 'show'])->name('units.show');
    Route::get('/units/{slug}/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
});

Route::get('/research-study/download-pdf', [RegisteredUserController::class, 'downloadParticipantInformationSheetPDF'])->name('research-study.download-pdf');


// Post Study Questionnaire Routes
Route::prefix('post-study-questionnaire')->group(function () {
    Route::get('/', [PostStudyQuestionnaireController::class, 'show'])->name('post-study-questionnaire.show');
    Route::post('/', [PostStudyQuestionnaireController::class, 'store'])->name('post-study-questionnaire.store');
});

require __DIR__.'/auth.php';

// Frontend routes
Route::get('/research-study', function () {
    return view('research-study');
});

