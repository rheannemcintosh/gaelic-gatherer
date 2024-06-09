<?php

use App\Http\Controllers\KnowledgeRetentionQuizController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostStudyQuestionnaireController;
use App\Http\Controllers\PreStudyQuestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserBadgeController;
use App\Http\Controllers\UserLessonController;
use Illuminate\Support\Facades\Route;

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Pre Study Questionnaire Routes
    Route::prefix('pre-study-questionnaire')->group(function () {
        Route::get('/consent', [PreStudyQuestionnaireController::class, 'showConsent'])->name('pre-study-questionnaire.show.consent');
        Route::post('/consent', [PreStudyQuestionnaireController::class, 'storeConsent'])->name('pre-study-questionnaire.store.consent');
        Route::get('/', [PreStudyQuestionnaireController::class, 'show'])->name('pre-study-questionnaire.show');
        Route::post('/', [PreStudyQuestionnaireController::class, 'store'])->name('pre-study-questionnaire.store');
    });

    // Welcome Routes
    Route::prefix('welcome')->group(function () {
        Route::get('/', [StudyController::class, 'showWelcomePage'])->name('welcome.show');
        Route::post('/', [StudyController::class, 'startTheStudy'])->name('welcome.store');
    });

    // Study Routes
    Route::get('/overview', [StudyController::class, 'showOverviewPage'])->name('overview.show');
    Route::get('/units/{slug}/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/user-lesson', [UserLessonController::class, 'store'])->name('user-lessons.store');
    Route::get('/badges/check', [UserBadgeController::class, 'checkForNewBadges'])->name('badges.check');
    Route::get('/complete', [StudyController::class, 'completeTheStudy'])->name('study.complete');
    Route::get('/on-hold', [StudyController::class, 'showOnHoldPage'])->name('on-hold.show');

    // Post Study Questionnaire Routes
    Route::prefix('post-study-questionnaire')->group(function () {
        Route::get('/consent', [PostStudyQuestionnaireController::class, 'showConsent'])->name('post-study-questionnaire.show.consent');
        Route::post('/consent', [PostStudyQuestionnaireController::class, 'storeConsent'])->name('post-study-questionnaire.store.consent');
        Route::get('/', [PostStudyQuestionnaireController::class, 'show'])->name('post-study-questionnaire.show');
        Route::post('/', [PostStudyQuestionnaireController::class, 'store'])->name('post-study-questionnaire.store');
    });

    // Knowledge Retention Quiz Routes
    Route::prefix('knowledge-retention-quiz')->group(function () {
        Route::get('/{quiz}/consent', [KnowledgeRetentionQuizController::class, 'showConsent'])->name('knowledge-retention-quiz.show.consent');
        Route::post('/{quiz}/consent', [KnowledgeRetentionQuizController::class, 'storeConsent'])->name('knowledge-retention-quiz.store.consent');
        Route::get('/{quiz}', [KnowledgeRetentionQuizController::class, 'show'])->name('knowledge-retention-quiz.show');
        Route::post('/{quiz}', [KnowledgeRetentionQuizController::class, 'store'])->name('knowledge-retention-quiz.store');
    });

    // Thank You Route
    Route::get('/thank-you', [StudyController::class, 'showThankYouPage'])->name('thank-you.show');

    // Help Route
    Route::get('/help', [StudyController::class, 'showHelpPage'])->name('help.show');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
