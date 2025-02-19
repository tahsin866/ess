<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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



Route::get('Markaz/Makaj_apply', function () {
    return Inertia::render('Markaz/Makaj_apply');
})->name('Markaz.Makaj_apply');

Route::get('Markaz/markaz_change_table', function () {
    return Inertia::render('Markaz/markaz_change_table');
})->name('Markaz.markaz_change_table');


Route::get('Markaz/Makaj_change', function () {
    return Inertia::render('Markaz/Makaj_change');
})->name('Markaz.Makaj_change');

Route::get('Markaz/markaz_agreement_form', function () {
    return Inertia::render('Markaz/markaz_agreement_form');
})->name('Markaz.markaz_agreement_form');


Route::get('Markaz/marhala_change_table', function () {
    return Inertia::render('Markaz/marhala_change_table');
})->name('Markaz.marhala_change_table');


Route::get('Markaz/marhala_change', function () {
    return Inertia::render('Markaz/marhala_change');
})->name('Markaz.marhala_change');

Route::get('students_registration/student_registration', function () {
    return Inertia::render('students_registration/student_registration');
})->name('students_registration.student_registration');

Route::get('students_registration/student_reg_table', function () {
    return Inertia::render('students_registration/student_reg_table');
})->name('students_registration.student_reg_table');

Route::get('students_registration/old_stu_reg_Form', function () {
    return Inertia::render('students_registration/old_stu_reg_Form');
})->name('students_registration.old_stu_reg_Form');


Route::get('students_registration/new_stu_reg_Form', function () {
    return Inertia::render('students_registration/new_stu_reg_Form');
})->name('students_registration.new_stu_reg_Form');

Route::get('students_registration/stuedent_reg_list', function () {
    return Inertia::render('students_registration/stuedent_reg_list');
})->name('students_registration.stuedent_reg_list');





require __DIR__ . '/auth.php';
