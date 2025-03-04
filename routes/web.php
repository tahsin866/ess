<?php
use App\Http\Controllers\MarhalaController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\admin\marhala_for_admin\Marhala;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('api')->group(function () {
    Route::get('/marhalas', [MarhalaController::class, 'getMarhalaList']);
    // Route::get('/marhalas/{id}/edit', [MarhalaController::class, 'edit']);
    // Route::put('/marhalas/{id}', [MarhalaController::class, 'update']);
});


// Route::get('Mrahala_for_Admin/marhala_edit/{marhala}', function ($marhala) {
//     $marhalaData = Marhala::with('subjects')->findOrFail($marhala);
//     return Inertia::render('Mrahala_for_Admin/marhala_edit', [
//         'marhala' => $marhalaData->toArray()
//     ]);
// })->name('Mrahala_for_Admin.marhala_edit');
Route::get('Mrahala_for_Admin/marhala_edit/{marhala}', [MarhalaController::class, 'edit'])
    ->name('Mrahala_for_Admin.marhala_edit');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin_auth.php';


require __DIR__ . '/Madrasha.php';

require __DIR__ . '/Admin.php';
