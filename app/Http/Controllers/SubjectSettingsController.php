<?php

namespace App\Http\Controllers;
use App\Models\admin\marhala_for_admin\subject_settings;
use App\Models\admin\marhala_for_admin\MarhalaSubject;
use App\Models\admin\marhala_for_admin\Marhala;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
class SubjectSettingsController extends Controller
{




//     public function getData(Marhala $marhala)
//     {
//         $marhalaData = Marhala::with('subjects')->findOrFail($marhala->id);

//         // Get student type based on status
//         $studentTypes = [];

//         switch($marhalaData->status) {
//             case 'SRtype_1':
//                 $studentTypes = ['male']; // শুধু male
//                 break;
//             case 'SRtype_0':
//                 $studentTypes = ['female']; // শুধু female
//                 break;
//             case 'both':
//                 $studentTypes = ['male', 'female']; // both হলে male/female দুইটাই থাকতে পারে
//                 break;
//         }

//         return response()->json([
//             'marhala' => $marhalaData,
//             'subjects' => $marhalaData->subjects,
//             'studentTypes' => $studentTypes
//         ]);
//     }






// public function store(Request $request)
// {
//     $validated = $request->validate([
//         'marhala_id' => 'required',

//         'subject_id' => 'required',
//         'Marhala_type' => 'required',
//         'Subject_Names' => 'required',
//         'student_type' => 'required',
//         'syllabus_type' => 'required',
//         'markaz_type' => 'required',
//         'subject_type' => 'required',
//         'total_marks' => 'required',
//         'pass_marks' => 'required',
//         'status' => 'required|in:active,inactive'
//     ]);

//     subject_settings::create($validated);

//     return redirect()->back()->with('success', 'Subject settings saved successfully');
// }


// public function getData($marhalaId)
// {
//     $marhala = Marhala::select('id', 'marhala_name_bn')->findOrFail($marhalaId);

//     $subject = MarhalaSubject::where('marhala_id', $marhalaId)
//         ->select('id', 'name_bangla', 'status')
//         ->first();

//     $subjects = MarhalaSubject::where('marhala_id', $marhalaId)
//         ->select('id', 'name_bangla', 'status')
//         ->get();

//     // Get student type based on subject status
//     $studentType = match($subject->status) {
//         'SRtype_1' => 'ছাত্র',
//         'SRtype_0' => 'ছাত্রী',
//         'both' => 'উভয়',
//         default => ''
//     };

//     return response()->json([
//         'marhala' => $marhala,
//         'subjects' => $subjects,
//         'studentType' => $studentType
//     ]);
// }



public function store(Request $request)
{
    $validated = $request->validate([
        'marhala_id' => 'required',
        'subject_id' => 'required',
        'Marhala_type' => 'required',
        'Subject_Names' => 'required',
        'student_type' => 'required',
        'syllabus_type' => 'required',
        'markaz_type' => 'required',
        'subject_type' => 'required',
        'subject_code' => 'required',
        'total_marks' => 'required',
        'pass_marks' => 'required',
        'status' => 'required|in:active,inactive'
    ]);

    subject_settings::create($validated);
    return redirect()->back()->with('success', 'Subject settings saved successfully');
}


public function getData($marhalaId)
{
    $marhala = Marhala::select('id', 'marhala_name_bn')->findOrFail($marhalaId);

    // Get the first subject's status
    // $subjectStatus = MarhalaSubject::where('marhala_id', $marhalaId)
    // // ->whereIn('status', ['SRtype_1', 'SRtype_0', 'both'])
    // // ->orderByRaw("FIELD(status, 'SRtype_1', 'SRtype_0', 'both')")
    // // ->value('status');

    $subjectStatus = MarhalaSubject::where('marhala_id', $marhalaId)
    ->whereIn('status', ['SRtype_1', 'SRtype_0', 'both'])
    ->orderByRaw("FIELD(status, 'SRtype_1', 'SRtype_0', 'both')")
    ->value('status');


    // Get all subjects
    $subjects = MarhalaSubject::where('marhala_id', $marhalaId)
    ->select('id', 'name_bangla', 'status', 'subject_code')
    ->get();

    // Determine student type
    $studentType = 'উভয়';  // Default to উভয়
    if ($subjectStatus === 'SRtype_1') {
        $studentType = 'ছাত্র';
    } elseif ($subjectStatus === 'SRtype_0') {
        $studentType = 'ছাত্রী';
    } elseif ($subjectStatus === 'both') {
        $studentType = 'উভয়';
    }



    return response()->json([
        'marhala' => $marhala,
        'subjects' => $subjects,
        'studentType' => $studentType
    ]);
}









}
