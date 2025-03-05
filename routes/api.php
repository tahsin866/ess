<?php
use App\Http\Controllers\MarhalaController;
use App\Http\Controllers\SubjectSettingsController;
use Illuminate\Support\Facades\Route;



Route::get('/marhalas/{id}/edit', [MarhalaController::class, 'edit']);
Route::put('/marhalas/{id}', [MarhalaController::class, 'update']);

Route::prefix('api')->group(function () {
    Route::get('/marhala/{marhala}/subjects', [SubjectSettingsController::class, 'getData']);

});
