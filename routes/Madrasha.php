<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




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

Route::get('students_registration/student_reg_card', function () {
    return Inertia::render('students_registration/student_reg_card');
})->name('students_registration.student_reg_card');

Route::get('students_registration/stu_reg_view', function () {
    return Inertia::render('students_registration/stu_reg_view');
})->name('students_registration.stu_reg_view');


Route::get('students_registration/stu_reg_payment', function () {
    return Inertia::render('students_registration/stu_reg_payment');
})->name('students_registration.stu_reg_payment');


Route::get('students_registration/stue_reg_draft_soft_delete', function () {
    return Inertia::render('students_registration/stue_reg_draft_soft_delete');
})->name('students_registration.stue_reg_draft_soft_delete');

// অন্তর্ভুক্তি রাউট

Route::get('OntorVukti/ontorvukti_table', function () {
    return Inertia::render('OntorVukti/ontorvukti_table');
})->name('OntorVukti.ontorvukti_table');

Route::get('OntorVukti/softDelete_draft_list', function () {
    return Inertia::render('OntorVukti/softDelete_draft_list');
})->name('OntorVukti.softDelete_draft_list');

Route::get('OntorVukti/stu_admit_card', function () {
    return Inertia::render('OntorVukti/stu_admit_card');
})->name('OntorVukti.stu_admit_card');

Route::get('OntorVukti/stu_payment', function () {
    return Inertia::render('OntorVukti/stu_payment');
})->name('OntorVukti.stu_payment');

// নেগরান/মুমতাহিন রাউট

Route::get('Negran_Mumtahin/negran_mumtahin', function () {
    return Inertia::render('Negran_Mumtahin/negran_mumtahin');
})->name('Negran_Mumtahin.negran_mumtahin');



Route::get('Negran_Mumtahin/negran_mumtahin_appy', function () {
    return Inertia::render('Negran_Mumtahin/negran_mumtahin_appy');
})->name('Negran_Mumtahin.negran_mumtahin_appy');


Route::get('Negran_Mumtahin/mumtahin_list', function () {
    return Inertia::render('Negran_Mumtahin/mumtahin_list');
})->name('Negran_Mumtahin.mumtahin_list');


Route::get('Negran_Mumtahin/negran_apoint_list', function () {
    return Inertia::render('Negran_Mumtahin/negran_apoint_list');
})->name('Negran_Mumtahin.negran_apoint_list');


// others

Route::get('others/notice', function () {
    return Inertia::render('others/notice');
})->name('others.notice');

Route::get('others/massaging', function () {
    return Inertia::render('others/massaging');
})->name('others.massaging');


// About_markaj

Route::get('About_markaj/madrasha_list', function () {
    return Inertia::render('About_markaj/madrasha_list');
})->name('About_markaj.madrasha_list');
