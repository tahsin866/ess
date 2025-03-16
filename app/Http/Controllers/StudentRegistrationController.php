<?php

namespace App\Http\Controllers;
use App\Models\reg_stu_information;
use App\Models\student;
use Illuminate\Http\Request;
use MirazMac\BanglaString\Translator\BijoyToAvro\Translator;
use Inertia\Inertia;


class StudentRegistrationController extends Controller
{


    public function editOldStudent($marhalaId, $roll, $reg_id)
    {
        // Find the student from students table
        $student = Student::where('Roll', $roll)
                         ->where('reg_id', $reg_id)
                         ->first();

        if (!$student) {
            return redirect()->back()->with('error', 'ছাত্র খুঁজে পাওয়া যায়নি');
        }

        // Check if student already has data in reg_stu_informations table
        $studentInfo = reg_stu_information::where('roll', $roll)
                                       ->where('reg_id', $reg_id)
                                       ->first();

        // Create translator instance for displaying Bengali data
        $translator = new Translator();

        // Translate the student data
        $student->Name = $translator->translate($student->Name);
        $student->Father = $translator->translate($student->Father);
        $student->Mother = $translator->translate($student->Mother ?? '');
        $student->DateofBirth = $translator->translate($student->DateofBirth);

        return Inertia::render('StudentRegistration/old_stu_reg_Form', [
            'student' => $student,
            'studentInfo' => $studentInfo,
            'marhalaId' => $marhalaId ?? null
        ]);
    }






public function updateStudentInfo(Request $request)
{
    $validated = $request->validate([
        'roll' => 'required',
        'reg_id' => 'required',
        'name_bn' => 'required',
        'name_en' => 'nullable',
        'name_ar' => 'nullable',
        'father_name_bn' => 'required',
        'father_name_en' => 'nullable',
        'father_name_ar' => 'nullable',
        'mother_name_bn' => 'nullable',
        'mother_name_en' => 'nullable',
        'mother_name_ar' => 'nullable',
        'BRN_no' => 'nullable',
        'NID_no' => 'nullable',
    ]);

    // Update or create record in reg_stu_informations table
    reg_stu_information::updateOrCreate(
        ['roll' => $validated['roll'], 'reg_id' => $validated['reg_id']],
        $validated
    );

    // Update mother's name in students table if provided
    if (!empty($validated['mother_name_bn'])) {
        Student::where('Roll', $validated['roll'])
              ->where('reg_id', $validated['reg_id'])
              ->update(['Mother' => $validated['mother_name_bn']]);
    }

    return redirect()->back()->with('success', 'ছাত্রের তথ্য সফলভাবে আপডেট করা হয়েছে');
}

}
