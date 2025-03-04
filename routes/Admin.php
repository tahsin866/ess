<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\admin\marhala_for_admin\Marhala;



// মারহালা সেটাপ

Route::get('Mrahala_for_Admin/marhala_details_list', function () {
    return Inertia::render('Mrahala_for_Admin/marhala_details_list');
})->name('Mrahala_for_Admin.marhala_details_list');


Route::get('Mrahala_for_Admin/marhala_setup_list', function () {
    return Inertia::render('Mrahala_for_Admin/marhala_setup_list');
})->name('Mrahala_for_Admin.marhala_setup_list');

// Route::get('Mrahala_for_Admin/marhala_edit/{marhala}', function ($marhala) {
//     $marhalaData = Marhala::with('subjects')->findOrFail($marhala);

//     return Inertia::render('Mrahala_for_Admin/marhala_edit', [
//         'marhala' => $marhalaData
//     ]);
// })->name('Mrahala_for_Admin.marhala_edit');



// সাবজেক্ট সেটাপ


Route::get('subjects_for_Admin/subject_setup_list', function () {
    return Inertia::render('subjects_for_Admin/subject_setup_list');
})->name('subjects_for_Admin.subject_setup_list');


Route::get('subjects_for_Admin/subject_search_wizard', function () {
    return Inertia::render('subjects_for_Admin/subject_search_wizard');
})->name('subjects_for_Admin.subject_search_wizard');


Route::get('subjects_for_Admin/subject_setup', function () {
    return Inertia::render('subjects_for_Admin/subject_setup');
})->name('subjects_for_Admin.subject_setup');


// কেন্দ্রীয় পরীক্ষা সেটাপ


Route::get('central_Exam_setup/central_exam_mng', function () {
    return Inertia::render('central_Exam_setup/central_exam_mng');
})->name('central_Exam_setup.central_exam_mng');


Route::get('central_Exam_setup/nibondon_setup', function () {
    return Inertia::render('central_Exam_setup/nibondon_setup');
})->name('central_Exam_setup.nibondon_setup');

Route::get('central_Exam_setup/ontorvukti_setup', function () {
    return Inertia::render('central_Exam_setup/ontorvukti_setup');
})->name('central_Exam_setup.ontorvukti_setup');

Route::get('central_Exam_setup/others_setup', function () {
    return Inertia::render('central_Exam_setup/others_setup');
})->name('central_Exam_setup.others_setup');


Route::get('Bill_setup_admin/negran_bill_setup', function () {
    return Inertia::render('Bill_setup_admin/negran_bill_setup');
})->name('Bill_setup_admin.negran_bill_setup');



Route::get('Bill_setup_admin/markaz_admin_bill', function () {
    return Inertia::render('Bill_setup_admin/markaz_admin_bill');
})->name('Bill_setup_admin.markaz_admin_bill');


Route::get('Bill_setup_admin/mumtahin_bill', function () {
    return Inertia::render('Bill_setup_admin/mumtahin_bill');
})->name('Bill_setup_admin.mumtahin_bill');


// marjaz_for_admin

Route::get('markaz_for_admin/markaz_setup', function () {
    return Inertia::render('markaz_for_admin/markaz_setup');
})->name('markaz_for_admin.markaz_setup');




// মাদরাসা ডাটা



Route::get('madrasha_data_for_admin/madrasha_list', function () {
    return Inertia::render('madrasha_data_for_admin/madrasha_list');
})->name('madrasha_data_for_admin.madrasha_list');


// নিবন্ধন লিস্ট

Route::get('nibondon_for_admin/nibondon_Markaz_list', function () {
    return Inertia::render('nibondon_for_admin/nibondon_Markaz_list');
})->name('nibondon_for_admin.nibondon_Markaz_list');

Route::get('nibondon_for_admin/abandon_stu_list', function () {
    return Inertia::render('nibondon_for_admin/abandon_stu_list');
})->name('nibondon_for_admin.abandon_stu_list');


Route::get('nibondon_for_admin/madrashaWari_stu_nibond_list', function () {
    return Inertia::render('nibondon_for_admin/madrashaWari_stu_nibond_list');
})->name('nibondon_for_admin.madrashaWari_stu_nibond_list');


Route::get('nibondon_for_admin/student_detiles_For_nibondon', function () {
    return Inertia::render('nibondon_for_admin/student_detiles_For_nibondon');
})->name('nibondon_for_admin.student_detiles_For_nibondon');




