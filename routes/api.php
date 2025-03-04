<?php
use App\Http\Controllers\MarhalaController;
use Illuminate\Support\Facades\Route;



Route::get('/marhalas/{id}/edit', [MarhalaController::class, 'edit']);
Route::put('/marhalas/{id}', [MarhalaController::class, 'update']);

