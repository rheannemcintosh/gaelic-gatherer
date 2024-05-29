<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BadgeUserController;
use App\Http\Controllers\KnowledgeRetentionQuizController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MyBadgesController;
use App\Http\Controllers\PostStudyQuestionnaireController;
use App\Http\Controllers\PreStudyQuestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserLessonController;
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

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Welcome Routes
    Route::get('/welcome', [StudyController::class, 'showWelconePage'])->name('welcome.show');
    Route::post('/welcome', [StudyController::class, 'startTheStudy'])->name('welcome.start');

    // Pre Study Questionnaire Routes
    Route::prefix('pre-study-questionnaire')->group(function () {
        Route::get('/consent', [PreStudyQuestionnaireController::class, 'showConsent'])->name('pre-study-questionnaire.show.consent');
        Route::post('/consent', [PreStudyQuestionnaireController::class, 'storeConsent'])->name('pre-study-questionnaire.store.consent');
        Route::get('/', [PreStudyQuestionnaireController::class, 'show'])->name('pre-study-questionnaire.show');
        Route::post('/', [PreStudyQuestionnaireController::class, 'store'])->name('pre-study-questionnaire.store');
    });

    // Post Study Questionnaire Routes
    Route::prefix('post-study-questionnaire')->group(function () {
        Route::get('/consent', [PostStudyQuestionnaireController::class, 'showConsent'])->name('post-study-questionnaire.show.consent');
        Route::post('/consent', [PostStudyQuestionnaireController::class, 'storeConsent'])->name('post-study-questionnaire.store.consent');
        Route::get('/', [PostStudyQuestionnaireController::class, 'show'])->name('post-study-questionnaire.show');
        Route::post('/', [PostStudyQuestionnaireController::class, 'store'])->name('post-study-questionnaire.store');
    });

    // Badge Routes
    Route::prefix('badges')->group(function () {
        Route::get('/', [MyBadgesController::class, 'index'])->name('badges.index');
        Route::get('/assign', [MyBadgesController::class, 'assignBadgesToUser'])->name('badges.assign');
        Route::get('/check', [MyBadgesController::class, 'checkForNewBadges'])->name('badges.check');
    });
});

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

// Knowledge Retention Quiz Routes
Route::prefix('knowledge-retention-quiz')->group(function () {
    Route::get('/', [KnowledgeRetentionQuizController::class, 'show'])->name('knowledge-retention-quiz.show');
    Route::post('/', [KnowledgeRetentionQuizController::class, 'store'])->name('knowledge-retention-quiz.store');
});


Route::middleware('auth')->group(function () {
    Route::prefix('user-lesson')->group(function () {
        Route::post('/', [UserLessonController::class, 'store'])->name('user-lessons.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('badge-user')->group(function () {
        Route::post('/', [BadgeUserController::class, 'store'])->name('badge-users.store');
    });
});

require __DIR__.'/auth.php';

// Frontend routes
Route::get('/research-study', function () {
    return view('research-study');
});

