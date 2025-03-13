<?php

use App\Http\Controllers\MarhalaController;
use App\Http\Controllers\SubjectSettingsController;
use App\Http\Controllers\ExamSetupController;
use App\Http\Controllers\ScheduleSetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkazAgreementController;
use App\Http\Controllers\MadrashaController;

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




    Route::get('/madrashas/list', [MarkazAgreementController::class, 'getMadrashas'])->name('madrashas.list');
    // Route::get('/exam-setups/latest', [MarkazAgreementController::class, 'getLatest'])->name('exam-setups.latest');
    Route::get('/markaz/get-table-data', [MarkazAgreementController::class, 'getTableData']);



    Route::get('/markaz-agreements', [MarkazAgreementController::class, 'fatch']);
// Route::get('/markaz-agreement-madrasas/counts', [MarkazAgreementController::class, 'getMadrasaCounts']);




Route::get('/markaz-madrashas/list', [MarkazAgreementController::class, 'getMadrashas'])->name('markaz.madrashas.list');




Route::post('/schedule-setups', [ScheduleSetupController::class, 'store']);



Route::get('/madrasha-list', [MadrashaController::class, 'getMadrashaList']);
Route::get('/madrasahs/{id}', [MadrashaController::class, 'show']);
Route::get('/madrasahs/{id}/edit', [MadrashaController::class, 'edit']);
Route::delete('/madrasahs/{id}', [MadrashaController::class, 'destroy']);



});


// Route::prefix('api')->group(function () {


// });
