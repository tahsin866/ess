<?php

namespace App\Http\Controllers;
use App\Models\admin\marhala_for_admin\MarhalaSubject;
use App\Models\admin\marhala_for_admin\subject_settings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class MarhalaListController extends Controller
{


    public function getsubjectForMadrasha($marhalaId)
    {
        return Inertia::render('Markaz/subjectSetting_list', [
            'marhalaId' => $marhalaId
        ]);
    }


public function getSubjects($marhalaId)
{
    // Get subjects from subject_settings table for the given marhala_id
    $subjects = subject_settings::where('marhala_id', $marhalaId)
        ->select('id', 'Subject_Names as name', 'syllabus_type', 'subject_id')
        ->get();

    // Filter mandatory subjects
    $mandatorySubjects = $subjects->filter(function ($subject) {
        return $subject->syllabus_type === 'আবশ্যিক';
    })->map(function ($subject) {
        // Get subject code from marhala_subjects table using subject_id
        $subjectCode = MarhalaSubject::where('id', $subject->subject_id)
            ->value('subject_code');

        return [
            'id' => $subject->id,
            'name' => $subject->name,
            'code' => $subjectCode ?? '', // Use subject code or empty string if not found
            'syllabus_type' => $subject->syllabus_type,
        ];
    })->values();

    // Filter optional subjects
    $optionalSubjects = $subjects->filter(function ($subject) {
        return $subject->syllabus_type === 'নৈর্বাচনিক';
    })->map(function ($subject) {
        // Get subject code from marhala_subjects table using subject_id
        $subjectCode = MarhalaSubject::where('id', $subject->subject_id)
            ->value('subject_code');

        return [
            'id' => $subject->id,
            'name' => $subject->name,
            'code' => $subjectCode ?? '', // Use subject code or empty string if not found
            'syllabus_type' => $subject->syllabus_type,
        ];
    })->values();

    // Return the response
    return response()->json([
        'mandatorySubjects' => $mandatorySubjects,
        'optionalSubjects' => $optionalSubjects,
    ]);
}





// =====================================================================

public function subedit($id)
{
    return Inertia::render('subjects_for_Admin/subject_setings_edit', [
        'id' => $id
    ]);
}



public function editSubject($id)
{
    $subject = subject_settings::findOrFail($id);
    return Inertia::render('subjects_for_Admin/subject_setings_edit', [
        'subject' => $subject
    ]);
}



public function getSubjectsettings($id)
{
    $subjectsettings = subject_settings::where('id', $id)->first();

    if (!$subjectsettings) {
        return response()->json(['error' => 'Subject settings not found'], 404);
    }

    return response()->json($subjectsettings);
}



public function updateSubjectSettings(Request $request, $id)
{
    $request->validate([

        'syllabus_type' => 'required',
        'markaz_type' => 'required',
        'subject_type' => 'required',
        'student_type' => 'required',
        'total_marks' => 'required|numeric',
        'pass_marks' => 'required|numeric',
        'status' => 'required',
    ]);

    $subjectSetting = subject_settings::findOrFail($id);

    $subjectSetting->update([

        'syllabus_type' => $request->syllabus_type,
        'markaz_type' => $request->markaz_type,
        'subject_type' => $request->subject_type,
        'student_type' => $request->student_type,
        'total_marks' => $request->total_marks,
        'pass_marks' => $request->pass_marks,
        'status' => $request->status,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'বিষয় সফলভাবে আপডেট করা হয়েছে।'
    ]);
}






}

