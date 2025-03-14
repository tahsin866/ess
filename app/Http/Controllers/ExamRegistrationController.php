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






    // public function getMarhalaInfo($marhalaId)
    // {
    //     // Map CID to class names
    //     $marhalaNamesMap = [
    //         '2' => 'ফযিলত',
    //         '3' => 'সানাবিয়া উলইয়া',
    //         '4' => 'সানাবিয়া',
    //          '5' => 'মুতাওয়াসসিতাহ',
    //          '6' => 'ইবতিদাইয়্যাহ',
    //          '7' => 'হিফযুল কুরআন',
    //          '7' => 'ইলমুত তাজবীদ ওয়াল ক্বিরাআত',
    //     ];

    //     return response()->json([
    //         'examName' => 'পরীক্ষা', // Replace with actual exam name if needed
    //         'marhalaName' => $marhalaNamesMap[$marhalaId] ?? 'Unknown'
    //     ]);
    // }

    /**
     * Get all student years
     */
    public function getStudentYears()
    {
        // Get distinct years from students table using ORM
        $years = Student::distinct()
            ->whereNotNull('years')
            ->pluck('years');

        return response()->json($years);
    }

    /**
     * Search students based on criteria
     */
    public function searchStudents(Request $request)
    {
        $query = Student::query();

        // Apply filters
        if ($request->filled('marhala')) {
            $query->where('CID', $request->marhala);
        }

        if ($request->filled('year')) {
            $query->where('years', $request->year);
        }

        if ($request->filled('roll')) {
            $query->where('Roll', $request->roll);
        }

        if ($request->filled('registration')) {
            $query->where('reg_id', $request->registration);
        }

        // Get the results
        $students = $query->get();

        return response()->json($students);
    }




}














