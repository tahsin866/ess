<?php

namespace App\Http\Controllers;

use App\Models\admin\marhala_for_admin\ExamSetup;
use App\Models\admin\marhala_for_admin\Marhala;
use App\Models\admin\marhala_for_admin\ExamFee;
use App\Models\reg_stu_information;
use App\Models\student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use MirazMac\BanglaString\Translator\BijoyToAvro\Translator;
use Illuminate\Support\Facades\Auth;

class ExamRegistrationController extends Controller
{



    public function examFeeList()
    {
        $latestExamSetup = ExamSetup::latest()->first();

        $examFees = ExamFee::select(
                'exam_fees.*',
                'marhalas.marhala_name_bn',
                'marhalas.id as marhala_id',
                'exam_setups.exam_name as exam_setup_name'
            )
            ->join('marhalas', 'exam_fees.exam_name', '=', 'marhalas.marhala_name_bn')
            ->join('exam_setups', 'exam_fees.exam_setup_id', '=', 'exam_setups.id')
            ->latest()
            ->where('exam_setup_id', $latestExamSetup->id)
            ->get()
            ->map(function ($fee) {
                return [
                    'id' => $fee->id,
                    'marhala_id' => $fee->marhala_id,
                    'marhala_name_bn' => $fee->marhala_name_bn,
                    'exam_setup_name' => $fee->exam_setup_name,
                    'regularStartDate' => $fee->reg_date_from,
                    'regularEndDate' => $fee->reg_date_to,
                    'regularFee' => $fee->reg_regular_fee,
                    'lateStartDate' => $fee->late_date_from,
                    'lateEndDate' => $fee->late_date_to,
                    'lateFee' => $fee->late_regular_fee,
                    'regularStudents' => 0,
                    'irregularStudents' => 0,
                ];
            });

        return response()->json([
            'examFees' => $examFees,
            'examName' => $latestExamSetup->exam_name
        ]);
    }




    public function getRegistrationData($marhalaId)
    {
        $latestExamSetup = ExamSetup::latest()->first();

        // Map CID to class names
        $marhalaNamesMap = [
            '2' => 'ফযিলত',
            '3' => 'সানাবিয়া উলইয়া',
            '4' => 'সানাবিয়া',
            '5' => 'মুতাওয়াসসিতাহ',
            '6' => 'ইবতিদাইয়্যাহ',
            '7' => 'হিফযুল কুরআন',
            '8' => 'ইলমুত তাজবীদ ওয়াল ক্বিরাআত',
        ];

        // Try to get marhala from database first
        $marhala = Marhala::find($marhalaId);
        $marhalaName = $marhala ? $marhala->marhala_name_bn : ($marhalaNamesMap[$marhalaId] ?? 'Unknown');

        return response()->json([
            'examName' => $latestExamSetup ? $latestExamSetup->exam_name : 'পরীক্ষা',
            'marhalaName' => $marhalaName
        ]);
    }







    // public function getStudentYears()
    // {
    //     // Get distinct years from students table using ORM
    //     $years = Student::distinct()
    //         ->whereNotNull('years')
    //         ->pluck('years');

    //     return response()->json($years);
    // }


    public function getStudentYears()
    {
        // Return only 2024 as the year
        return response()->json(['2024']);
    }


    public function searchStudents(Request $request)
    {
        $query = Student::query();

        // Apply filters
        if ($request->filled('marhala')) {
            $query->where('CID', $request->marhala);
        }

        // Set default year to 2024 if not provided
        $year = $request->filled('year') ? $request->year : '2024';
        $query->where('years', $year);

        if ($request->filled('roll')) {
            $query->where('Roll', $request->roll);
        }

        if ($request->filled('registration')) {
            $query->where('reg_id', $request->registration);
        }

        // Get the results with specific fields
        $students = $query->select('Name', 'Madrasha', 'Father', 'DateofBirth', 'Class', 'Markaj', 'Division', 'CID', 'years', 'Roll', 'reg_id', 'Absence',
                                  'SubValue_1', 'SubValue_2', 'SubValue_3', 'SubValue_4', 'SubValue_5', 'SubValue_6', 'SubValue_7', 'SubValue_8',
                                  'SubLabel_1', 'SubLabel_2', 'SubLabel_3', 'SubLabel_4', 'SubLabel_5', 'SubLabel_6', 'SubLabel_7', 'SubLabel_8',
                                  )
                          ->get();

        // Create translator instance
        $translator = new Translator();


        // Get marhalaId from header
        $marhalaId = $request->header('marhalaId');

        // Filter students based on special conditions
        $filteredStudents = collect();

        foreach ($students as $student) {
            // Translate fields
            $student->Madrasha = $translator->translate($student->Madrasha);
            $student->Name = $translator->translate($student->Name);
            $student->Father = $translator->translate($student->Father);
            $student->Division = $translator->translate($student->Division);
            $student->Class = $translator->translate($student->Class);
            $student->Markaj = $translator->translate($student->Markaj);
            // $student->Roll = $translator->translate($student->Roll);
            // $student->reg_id = $translator->translate($student->reg_id);
            $student->DateofBirth = $translator->translate($student->DateofBirth);

            // Skip students with Division = রাসিব for specific CID and marhalaId combinations
            if ($student->Division == 'রাসিব' && $student->years == '2024' && (
                ($student->CID == 3 && $marhalaId == 9) ||
                ($student->CID == 4 && $marhalaId == 10) ||
                ($student->CID == 5 && $marhalaId == 11) ||
                ($student->CID == 6 && $marhalaId == 12)
            )) {
                // Skip this student
                continue;
            }

            // For all other cases, include the student
            $filteredStudents->push($student);
        }

        // Process all students based on new conditions
        foreach ($filteredStudents as $student) {
            // Check if the student matches the specific combinations where rules should apply
            $shouldApplyRules = false;

            // Check for the specific combinations where rules should apply
            if (
                ($request->filled('marhala') && $request->marhala == 9) ||
                ($request->filled('marhala') && $request->marhala == 2 && $year == '2024') ||
                ($request->filled('marhala') && $request->marhala == 10) ||
                ($request->filled('marhala') && $request->marhala == 3 && $year == '2024') ||
                ($request->filled('marhala') && $request->marhala == 11) ||
                ($request->filled('marhala') && $request->marhala == 4 && $year == '2024') ||
                ($request->filled('marhala') && $request->marhala == 12) ||
                ($request->filled('marhala') && $request->marhala == 5 && $year == '2024') ||
                ($request->filled('marhala') && $request->marhala == 14) ||
                ($request->filled('marhala') && $request->marhala == 6 && $year == '2024')
            ) {
                $shouldApplyRules = true;
            }

            // Only apply the classification rules if the student matches the specific combinations
            if ($shouldApplyRules) {
                // Initialize counters
                $failedSubjects = 0;
                $absentSubjects = 0; // অনুপস্থিত (Absence field = 'অনুপস্থিত')
                $zeroSubjects = 0;   // অনু (SubValue = 0)

                $subjectFields = ['SubValue_1', 'SubValue_2', 'SubValue_3', 'SubValue_4',
                                 'SubValue_5', 'SubValue_6', 'SubValue_7', 'SubValue_8'];

                foreach ($subjectFields as $index => $field) {
                    $labelField = 'SubLabel_' . ($index + 1);
                    $absenceField = 'Absence_' . ($index + 1);

                    // Only count subjects that have a label (name)
                    if (isset($student->$labelField) && !empty($student->$labelField)) {
                        // Count subjects with marks below 33 but not 0 (ফেল)
                        if (isset($student->$field) && $student->$field < 33 && $student->$field > 0) {
                            $failedSubjects++;
                        }

                        // Count subjects with 0 marks (অনু)
                        if (isset($student->$field) && $student->$field === 0) {
                            $zeroSubjects++;
                        }

                        // Count subjects marked as 'অনুপস্থিত'
                        if (isset($student->$absenceField) && $student->$absenceField === 'অনুপস্থিত') {
                            $absentSubjects++;
                        }
                    }
                }

                // Determine student type based on the new rules

                // "অনিয়মিত যেমনী" conditions
                if (
                    // 1. এক বা দুই বিষয়ে ফেল এবং বিভাগ রাসিব
                    (($failedSubjects == 1 || $failedSubjects == 2) && $student->Division === 'রাসিব') ||

                    // 2. এক বা দুই বিষয়ে অনু (SubValue = 0) এবং কোন বিষয়ে ফেল নেই
                    (($zeroSubjects == 1 || $zeroSubjects == 2) && $failedSubjects == 0) ||

                    // 3. এক বিষয়ে অনু এবং এক বিষয়ে ফেল
                    ($zeroSubjects == 1 && $failedSubjects == 1)
                ) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }

                // "অনিয়মিত অন্যান্য" conditions
                elseif (
                    // 1. দুয়ের অধিক বিষয়ে ফেল এবং বিভাগ রাসিব
                    ($failedSubjects > 2 && $student->Division === 'রাসিব') ||

                    // 2. দুই বিষয় অনু এক বিষয়ে ফেল বা এক বিষয়ে অনু দুই বিষয়ে ফেল
                    ($zeroSubjects == 2 && $failedSubjects == 1) ||
                    ($zeroSubjects == 1 && $failedSubjects == 2) ||

                    // 3. এক বিষয়ে অনু এবং দুয়ের অধিক বিষয়ে ফেল
                    ($zeroSubjects == 1 && $failedSubjects > 2) ||

                    // 4. একের অধিক অনু একের অধিক ফেল
                    ($zeroSubjects > 1 && $failedSubjects > 1) ||

                    // 5. দুয়ের অধিক অনু বিভাগ অনু
                    ($zeroSubjects > 2 && $student->Absence === 'অনুপস্থিত')
                ) {
                    $student->student_type = 'অনিয়মিত অন্যান্য';
                }

                // Division = রাসিব এবং মুমতায নয় এমন হলে মানউন্নয়ন
                elseif ($student->Division !== 'রাসিব' && $student->Division !== 'মুমতায') {
                    $student->student_type = 'মানউন্নয়ন';
                }

                // Debugging info
                $student->failed_subjects = $failedSubjects;
                $student->absent_subjects = $absentSubjects;
                $student->zero_subjects = $zeroSubjects;
            } else {
                // For students that don't match the specific combinations, set a default type
                $student->student_type = 'নিয়মিত'; // Or any other default type you prefer
            }
        }

        // যদি রেজাল্ট ফাঁকা হয়, তাহলে error message দিবে
        if ($filteredStudents->isEmpty()) {
            return response()->json(['error' => 'রেজাল্ট পাওয়া যায়নি'], 404);
        }

        return response()->json($filteredStudents);
    }












public function editStudentRegistration(Request $request)
{
    // Check if we have encoded data
    if ($request->has('data')) {
        // Decode the data
        try {
            $decodedData = base64_decode($request->data);
            list($roll, $reg_id,$CID) = explode(':', $decodedData);

            return Inertia::render('students_registration/old_stu_reg_edit', [
                'roll' => $roll,
                'reg_id' => $reg_id,
                'CID' => $CID
            ]);
        } catch (\Exception $e) {
            // Handle decoding error
            return redirect()->back()->with('error', 'Invalid student data');
        }
    }
    // Fallback to direct parameters if encoded data is not provided
    else if ($request->has('roll') && $request->has('reg_id')&& $request->has('CID')) {
        return Inertia::render('students_registration/old_stu_reg_edit', [
            'roll' => $request->roll,
            'reg_id' => $request->reg_id,
            'CID' => $request->CID
        ]);
    }
    // No valid data provided
    else {
        return redirect()->back()->with('error', 'Student information is missing');
    }
}














public function getStudentForEdit(Request $request)
{
    $roll = $request->query('roll');
    $reg_id = $request->query('reg_id');
    $CID = $request->query('CID');

    $marhalaId = $request->header('marhalaId');

    // Fetch the student data based on roll and registration ID using Eloquent
    $student = Student::where('Roll', $roll)
        ->where('reg_id', $reg_id)

        ->where('CID', $CID)
        ->first();

    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    // Create response structure with both past and current exam info
    $response = [
        'pastExam' => [
            'id' => $student->id,
            'Name' => $student->Name,
            'Father' => $student->Father,
            'Mother' => $student->Mother,
            'DateofBirth' => $student->DateofBirth,
            'Roll' => $student->Roll,
            'reg_id' => $student->reg_id,
            'Madrasha' => $student->Madrasha, // From students table
            'Markaj' => $student->Markaj,
            'Class' => $student->Class, // From students table
            'Division' => $student->Division
        ],
        'currentExam' => [
            'Madrasha' => Auth::user()->madrasha_name, // From authenticated user
            'Markaj' => $student->Markaj, // Assuming this is the same
            'Class' => $this->getClassNameByMarhalaId($marhalaId), // Based on marhalaId
            'marhalaId' => $marhalaId
        ]
    ];

    // Determine student type based on the logic
    $this->determineStudentType($response['currentExam'], $marhalaId, $student);

    return response()->json($response);
}

/**
 * Get class name based on marhalaId
 */
private function getClassNameByMarhalaId($marhalaId)
{
    $classNames = [
        '9' => 'ফযিলত',
        '10' => 'সানাবিয়া উলইয়া',
        '11' => 'সানাবিয়া',
        '12' => 'মুতাওয়াসসিতাহ',
        '14' => 'ইবতেদাইয়্যাহ'
    ];

    return $classNames[$marhalaId] ?? '';
}

/**
 * Determine the student type based on grades and other criteria
 */


private function determineStudentType(&$currentExam, $marhalaId, $student)
{
    // Default student type
    $currentExam['student_type'] = 'নিয়মিত';

    // Check if the student matches the specific combinations where rules should apply
    $shouldApplyRules = false;
    $year = $student->years ?? '2024';

    // Check for the specific combinations where rules should apply
    if (
        ($student->CID == 9) ||
        ($student->CID == 2 && $year == '2024') ||
        ($student->CID == 10) ||
        ($student->CID == 3 && $year == '2024') ||
        ($student->CID == 11) ||
        ($student->CID == 4 && $year == '2024') ||
        ($student->CID == 12) ||
        ($student->CID == 5 && $year == '2024') ||
        ($student->CID == 14) ||
        ($student->CID == 6 && $year == '2024')
    ) {
        $shouldApplyRules = true;
    }

    // Only apply the classification rules if the student matches the specific combinations
    if ($shouldApplyRules) {
        // Initialize counters
        $failedSubjects = 0;
        $absentSubjects = 0; // অনুপস্থিত (Absence field = 'অনুপস্থিত')
        $zeroSubjects = 0;   // অনু (SubValue = 0)

        $subjectFields = [
            'SubValue_1', 'SubValue_2', 'SubValue_3', 'SubValue_4',
            'SubValue_5', 'SubValue_6', 'SubValue_7', 'SubValue_8'
        ];

        foreach ($subjectFields as $index => $field) {
            $labelField = 'SubLabel_' . ($index + 1);
            $absenceField = 'Absence_' . ($index + 1);

            // Only count subjects that have a label (name)
            if (isset($student->$labelField) && !empty($student->$labelField)) {
                // Count subjects with marks below 33 but not 0 (ফেল)
                if (isset($student->$field) && $student->$field < 33 && $student->$field > 0) {
                    $failedSubjects++;
                }

                // Count subjects with 0 marks (অনু)
                if (isset($student->$field) && $student->$field === 0) {
                    $zeroSubjects++;
                }

                // Count subjects marked as 'অনুপস্থিত'
                if (isset($student->$absenceField) && $student->$absenceField === 'অনুপস্থিত') {
                    $absentSubjects++;
                }
            }
        }

        // "অনিয়মিত যেমনী" conditions
        if (
            // 1. এক বা দুই বিষয়ে ফেল এবং বিভাগ রাসিব
            (($failedSubjects == 1 || $failedSubjects == 2) && $student->Division === 'রাসিব') ||

            // 2. এক বা দুই বিষয়ে অনু (SubValue = 0) এবং কোন বিষয়ে ফেল নেই
            (($zeroSubjects == 1 || $zeroSubjects == 2) && $failedSubjects == 0) ||

            // 3. এক বিষয়ে অনু এবং এক বিষয়ে ফেল
            ($zeroSubjects == 1 && $failedSubjects == 1)
        ) {
            $currentExam['student_type'] = 'অনিয়মিত যেমনী';
        }

        // "অনিয়মিত অন্যান্য" conditions
        elseif (
            // 1. দুয়ের অধিক বিষয়ে ফেল এবং বিভাগ রাসিব
            ($failedSubjects > 2 && $student->Division === 'রাসিব') ||

            // 2. দুই বিষয় অনু এক বিষয়ে ফেল বা এক বিষয়ে অনু দুই বিষয়ে ফেল
            ($zeroSubjects == 2 && $failedSubjects == 1) ||
            ($zeroSubjects == 1 && $failedSubjects == 2) ||

            // 3. এক বিষয়ে অনু এবং দুয়ের অধিক বিষয়ে ফেল
            ($zeroSubjects == 1 && $failedSubjects > 2) ||

            // 4. একের অধিক অনু একের অধিক ফেল
            ($zeroSubjects > 1 && $failedSubjects > 1) ||

            // 5. দুয়ের অধিক অনু বিভাগ অনু
            ($zeroSubjects > 2 && $student->Absence === 'অনুপস্থিত')
        ) {
            $currentExam['student_type'] = 'অনিয়মিত অন্যান্য';
        }

        // Division = রাসিব এবং মুমতায নয় এমন হলে মানউন্নয়ন
        elseif ($student->Division !== 'রাসিব' && $student->Division !== 'মুমতায') {
            $currentExam['student_type'] = 'মানউন্নয়ন';
        }

        // Store the counts for debugging/reference
        $currentExam['failed_subjects'] = $failedSubjects;
        $currentExam['absent_subjects'] = $absentSubjects;
        $currentExam['zero_subjects'] = $zeroSubjects;
    }

    // Add a field for irregular subjects if needed
    $currentExam['irregular_subjects'] = $this->getIrregularSubjects($student, $currentExam['student_type']);
}

/**
 * Get the list of irregular subjects for the student
 */
private function getIrregularSubjects($student, $studentType)
{
    $irregularSubjects = [];

    // Only process if student is irregular
    if ($studentType === 'অনিয়মিত যেমনী' || $studentType === 'অনিয়মিত অন্যান্য') {
        $subjectFields = [
            'SubValue_1', 'SubValue_2', 'SubValue_3', 'SubValue_4',
            'SubValue_5', 'SubValue_6', 'SubValue_7', 'SubValue_8'
        ];

        // If student type is "অনিয়মিত অন্যান্য", show all subjects
        if ($studentType === 'অনিয়মিত অন্যান্য') {
            $allSubjects = [];
            foreach ($subjectFields as $index => $field) {
                $labelField = 'SubLabel_' . ($index + 1);
                if (isset($student->$labelField) && !empty($student->$labelField)) {
                    $allSubjects[] = $student->$labelField;
                }
            }
            return implode(', ', $allSubjects);
        }

        // For "অনিয়মিত যেমনী", only show failed or zero-mark subjects
        foreach ($subjectFields as $index => $field) {
            $labelField = 'SubLabel_' . ($index + 1);

            // Check if this is a failed or zero-mark subject
            if (isset($student->$labelField) && !empty($student->$labelField)) {
                if (
                    (isset($student->$field) && $student->$field < 33) ||
                    (isset($student->$field) && $student->$field === 0)
                ) {
                    $irregularSubjects[] = $student->$labelField;
                }
            }
        }
    }

    return implode(', ', $irregularSubjects);
}















}









