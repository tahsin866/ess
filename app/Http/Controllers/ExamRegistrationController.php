<?php

namespace App\Http\Controllers;

use App\Models\admin\marhala_for_admin\ExamSetup;
use App\Models\admin\marhala_for_admin\Marhala;
use App\Models\admin\marhala_for_admin\ExamFee;
use App\Models\student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;



class ExamRegistrationController extends Controller
{
    //
    // public function examFeeList()
    // {
    //     $latestExamSetup = ExamSetup::latest()->first();

    //     $examFees = ExamFee::select('exam_fees.*', 'marhalas.marhala_name_bn')
    //         ->join('marhalas', 'exam_fees.exam_name', '=', 'marhalas.marhala_name_bn')
    //         ->latest()
    //         ->where('exam_setup_id', $latestExamSetup->id)
    //         ->get()
    //         ->map(function ($fee) {
    //             return [
    //                 'id' => $fee->id,
    //                 'marhala_name_bn' => $fee->marhala_name_bn,
    //                 'regularStartDate' => $fee->reg_date_from,
    //                 'regularEndDate' => $fee->reg_date_to,
    //                 'regularFee' => $fee->reg_regular_fee,
    //                 'lateStartDate' => $fee->late_date_from,
    //                 'lateEndDate' => $fee->late_date_to,
    //                 'lateFee' => $fee->late_regular_fee,
    //                 'regularStudents' => 0,
    //                 'irregularStudents' => 0,
    //             ];
    //         });

    //     return response()->json([
    //         'examFees' => $examFees,
    //         'examName' => $latestExamSetup->exam_name
    //     ]);
    // }




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

        // Get the results
        $students = $query->get();

        // ✅ CID = 3, years = 2024, Division ≠ 'রাসিব' এবং Absence ফিল্ডে 'অনুপস্থিত' না থাকলে রেজাল্ট শো করবে
        if ($request->filled('marhala') && $request->marhala == 3) {
            $filteredStudents = $students->filter(function ($student) {
                // Division 'রাসিব' হলে বাদ দেবে
                if ($student->Division === 'রাসিব') {
                    return false;
                }

                // যদি কোনো Absence_* ফিল্ডে 'অনুপস্থিত' থাকে তাহলে বাদ দেবে
                for ($i = 1; $i <= 8; $i++) {
                    $absenceField = "Absence_$i";
                    if (isset($student->$absenceField) && $student->$absenceField === 'অনুপস্থিত') {
                        return false;
                    }
                }

                return true; // যদি শর্ত মিলে তাহলে রেজাল্ট শো করবে
            });

            // যদি রেজাল্ট ফাঁকা হয়, তাহলে error message দিবে
            if ($filteredStudents->isEmpty()) {
                return response()->json(['error' => 'রেজাল্ট পাওয়া যায়নি'], 404);
            }

            return response()->json($filteredStudents);
        }

        // ✅ আগের CID = 2 এবং years = 2024 সংক্রান্ত লজিক অপরিবর্তিত রাখা হয়েছে
        foreach ($students as $student) {
            if ($student->CID == 2 && $student->years == '2024') {
                // Initialize counters
                $failedSubjects = 0;
                $absentSubjects = 0;
                $zeroSubjects = 0;

                $subjectFields = ['SubValue_1', 'SubValue_2', 'SubValue_3', 'SubValue_4',
                                 'SubValue_5', 'SubValue_6', 'SubValue_7', 'SubValue_8'];

                foreach ($subjectFields as $field) {
                    $absenceField = str_replace('SubValue', 'Absence', $field);

                    // Count subjects with marks below 33 but not 0
                    if (isset($student->$field) && $student->$field < 33 && $student->$field > 0) {
                        $failedSubjects++;
                    }

                    // Count subjects with 0 marks
                    if (isset($student->$field) && $student->$field === 0) {
                        $zeroSubjects++;
                    }

                    // Count subjects marked as 'অনুপস্থিত'
                    if (isset($student->$absenceField) && $student->$absenceField === 'অনুপস্থিত') {
                        $absentSubjects++;
                    }
                }

                // Determine student type based on the rules
                if (
                    ($failedSubjects == 1 && $zeroSubjects == 1) ||
                    $absentSubjects > 0
                ) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($failedSubjects == 1 && $student->Division === 'রাসিব' && $absentSubjects == 0) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($failedSubjects == 2 && $student->Division === 'রাসিব' && $absentSubjects == 0) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($absentSubjects == 1 && $student->Division === 'রাসিব' && $failedSubjects == 0) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($absentSubjects == 2 && $student->Division === 'রাসিব' && $failedSubjects == 0) {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($failedSubjects == 1 && $absentSubjects == 1 && $student->Division === 'রাসিব') {
                    $student->student_type = 'অনিয়মিত যেমনী';
                }
                elseif ($student->Division === 'রাসিব') {
                    $student->student_type = 'অনিয়মিত অন্যান্য';
                }
                elseif ($student->Division !== 'রাসিব' && $absentSubjects == 0) {
                    $student->student_type = 'নিয়মিত';
                } else {
                    $student->student_type = 'অনিয়মিত অন্যান্য';
                }

                // Debugging info
                $student->failed_subjects = $failedSubjects;
                $student->absent_subjects = $absentSubjects;
            } else {
                // For students not in CID=2 and years=2024
                if ($student->Division !== 'রাসিব') {
                    $student->student_type = 'নিয়মিত';
                } else {
                    // Check if any subject is marked as absent
                    $hasAbsence = false;
                    for ($i = 1; $i <= 8; $i++) {
                        $absenceField = "Absence_$i";
                        if (isset($student->$absenceField) && $student->$absenceField === 'অনুপস্থিত') {
                            $hasAbsence = true;
                            break;
                        }
                    }

                    $student->student_type = $hasAbsence ? 'অনিয়মিত অন্যান্য' : 'নিয়মিত';
                }
            }
        }

        return response()->json($students);
    }



}














