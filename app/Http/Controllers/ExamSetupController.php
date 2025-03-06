<?php

namespace App\Http\Controllers;
use App\Models\admin\marhala_for_admin\ExamSetup;
use App\Models\admin\marhala_for_admin\ExamFee;
use App\Models\admin\marhala_for_admin\Marhala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class ExamSetupController extends Controller
{

    public function index_2()
{
    return ExamSetup::orderBy('id', 'desc')
        ->select('id', 'exam_name', 'arabic_year', 'bangla_year', 'english_year')
        ->get();
}
    //



    public function edit($id)
    {
        $examFee = ExamFee::findOrFail($id);
        $examSetup = ExamSetup::select('exam_name', 'arabic_year', 'bangla_year', 'english_year')
            ->where('id', $examFee->exam_setup_id)
            ->first();

        return Inertia::render('central_Exam_setup/central_exam_edit', [
            'examFee' => $examFee,
            'examSetup' => $examSetup
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'reg_date_from' => 'required|date',
            'reg_date_to' => 'required|date',
            'reg_regular_fee' => 'required|numeric',
            'reg_irregular_jemni' => 'required|numeric',
            'reg_irregular_manonnoyon' => 'required|numeric',
            'reg_irregular_others' => 'required|numeric',
            'late_date_from' => 'required|date',
            'late_date_to' => 'required|date',
            'late_regular_fee' => 'required|numeric',
            'late_irregular_jemni' => 'required|numeric',
            'late_irregular_manonnoyon' => 'required|numeric',
            'late_irregular_others' => 'required|numeric'
        ]);

        $examFee = ExamFee::findOrFail($id);
        $examFee->update($validated);

        return redirect()->route('central-exam-setup.index')
            ->with('message', 'পরীক্ষার ফি সফলভাবে আপডেট করা হয়েছে');
    }

}
