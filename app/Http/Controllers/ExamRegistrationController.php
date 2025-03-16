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
            $student->Roll = $translator->translate($student->Roll);
            $student->reg_id = $translator->translate($student->reg_id);
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








    public function editOldStudent(Request $request)
    {
        $roll = $request->roll;
        $regId = $request->reg_id;

        // Fetch the basic student data from students table
        $student = Student::where('Roll', $roll)
                         ->where('reg_id', $regId)
                         ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'ছাত্র খুঁজে পাওয়া যায়নি');
        }

        // Fetch additional information if it exists
        $additionalInfo = reg_stu_information::where('roll', $roll)
                                            ->where('reg_id', $regId)
                                            ->first();

        return Inertia::render('StudentRegistration/EditOldStudent', [
            'studentBasicInfo' => $student,
            'additionalInfo' => $additionalInfo
        ]);
    }

    public function updateOldStudent(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'roll' => 'required|string',
            'reg_id' => 'required|string',
            'nameEnglish' => 'nullable|string|max:255',
            'nameArabic' => 'nullable|string|max:255',
            'fatherNameEnglish' => 'nullable|string|max:255',
            'fatherNameArabic' => 'nullable|string|max:255',
            'motherNameEnglish' => 'nullable|string|max:255',
            'motherNameArabic' => 'nullable|string|max:255',
            'birthRegNo' => 'nullable|string|max:20',
            'nidNo' => 'nullable|string|max:20',
            // Add other fields as needed
        ]);

        try {
            // Check if a record already exists
            $studentInfo = reg_stu_information::where('roll', $validated['roll'])
                ->where('reg_id', $validated['reg_id'])
                ->first();

            if ($studentInfo) {
                // Update existing record
                $studentInfo->name_en = $validated['nameEnglish'];
                $studentInfo->name_ar = $validated['nameArabic'];
                $studentInfo->father_name_en = $validated['fatherNameEnglish'];
                $studentInfo->father_name_ar = $validated['fatherNameArabic'];
                $studentInfo->mother_name_en = $validated['motherNameEnglish'];
                $studentInfo->mother_name_ar = $validated['motherNameArabic'];
                $studentInfo->birth_reg_no = $validated['birthRegNo'];
                $studentInfo->nid_no = $validated['nidNo'];
                $studentInfo->save();
            } else {
                // Create a new record
                $studentInfo = new reg_stu_information();
                $studentInfo->roll = $validated['roll'];
                $studentInfo->reg_id = $validated['reg_id'];
                $studentInfo->name_en = $validated['nameEnglish'];
                $studentInfo->name_ar = $validated['nameArabic'];
                $studentInfo->father_name_en = $validated['fatherNameEnglish'];
                $studentInfo->father_name_ar = $validated['fatherNameArabic'];
                $studentInfo->mother_name_en = $validated['motherNameEnglish'];
                $studentInfo->mother_name_ar = $validated['motherNameArabic'];
                $studentInfo->birth_reg_no = $validated['birthRegNo'];
                $studentInfo->nid_no = $validated['nidNo'];
                $studentInfo->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'ছাত্রের তথ্য সফলভাবে সংরক্ষণ করা হয়েছে'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'তথ্য সংরক্ষণ করতে সমস্যা হয়েছে',
                'error' => $e->getMessage()
            ], 500);
        }
    }








}














