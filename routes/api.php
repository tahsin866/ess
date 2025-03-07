<?php

use App\Http\Controllers\MarhalaController;
use App\Http\Controllers\SubjectSettingsController;
use App\Http\Controllers\ExamSetupController;
use Illuminate\Support\Facades\Route;



Route::get('/marhalas/{id}/edit', [MarhalaController::class, 'edit']);
Route::put('/marhalas/{id}', [MarhalaController::class, 'update']);

Route::prefix('api')->group(function () {
    Route::get('/marhala/{marhala}/subjects', [SubjectSettingsController::class, 'getData']);

    Route::get('/subjects', [SubjectSettingsController::class, 'index']);
    Route::post('/subject-settings', [SubjectSettingsController::class, 'store'])->name('subject-settings.store');
    Route::get('/subjects', [SubjectSettingsController::class, 'search']);
    Route::post('/exam-setups', [SubjectSettingsController::class, 'store_1']);

    Route::get('/exam-setups/latest', [SubjectSettingsController::class, 'getLatest']);
    Route::get('/marhalas', [SubjectSettingsController::class, 'index_1']);
    Route::post('/exam-fees', [SubjectSettingsController::class, 'store_2']);

    Route::get('/exam-setups_1', [ExamSetupController::class, 'index_2']);



    Route::put('/central-exam-setup/{id}', [ExamSetupController::class, 'update'])
        ->name('central_Exam_setup.update');

    Route::get('/central-exam-setup', [ExamSetupController::class, 'index'])
        ->name('central_Exam_setup.index');
});


// Route::prefix('api')->group(function () {
//     Route::get('/central-exam-setup/{id}', [ExamSetupController::class, 'getExamDetails']);
//     Route::put('/central-exam-setup/{id}', [ExamSetupController::class, 'updateExamDetails']);
// });
