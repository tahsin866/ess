<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\admin\marhala_for_admin\Marhala;
use App\Models\admin\marhala_for_admin\MarhalaSubject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MarhalaController extends Controller
{
    public function index()
    {
        $marhalas = Marhala::with('subjects')->get();
        return Inertia::render('Marhala/Index', [
            'marhalas' => $marhalas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'marhalaNameBn' => 'required|string',
            'marhalaNameEn' => 'required|string',
            'marhalaNameAr' => 'required|string',
            'subjects' => 'required|array'
        ]);

        $marhala = Marhala::create([
            'marhala_name_bn' => $request->marhalaNameBn,
            'marhala_name_en' => $request->marhalaNameEn,
            'marhala_name_ar' => $request->marhalaNameAr,
        ]);

        foreach ($request->subjects as $subject) {
            MarhalaSubject::create([
                'marhala_id' => $marhala->id,
                'subject_code' => $subject['code'],
                'name_bangla' => $subject['nameBangla'],
                'name_english' => $subject['nameEnglish'],
                'name_arabic' => $subject['nameArabic'],
                'status' => $subject['status']
            ]);
        }

        return redirect()->back()->with('success', 'Marhala created successfully');
    }

    public function edit($id)
    {
        // Fetch the marhala and its subjects
        $marhala = Marhala::with('subjects')->findOrFail($id);

        // Return the view with the data
        return inertia('Mrahala_for_Admin/marhala_edit', [
            'marhala' => $marhala,
            'subjects' => $marhala->subjects
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'marhalaNameBn' => 'required|string',
            'marhalaNameEn' => 'required|string',
            'marhalaNameAr' => 'required|string',
            'subjects' => 'required|array',
        ]);

        $marhala = Marhala::findOrFail($id);

        // Update marhala
        $marhala->update([
            'marhala_name_bn' => $request->marhalaNameBn,
            'marhala_name_en' => $request->marhalaNameEn,
            'marhala_name_ar' => $request->marhalaNameAr,
        ]);

        // Update subjects
        foreach ($request->subjects as $subjectData) {
            MarhalaSubject::updateOrCreate(
                ['marhala_id' => $marhala->id, 'subject_code' => $subjectData['code']],
                [
                    'name_bangla' => $subjectData['nameBangla'],
                    'name_english' => $subjectData['nameEnglish'],
                    'name_arabic' => $subjectData['nameArabic'],
                    'status' => $subjectData['status'],
                ]
            );
        }

        // Redirect to the edit page after update
        return redirect()->route('marhalas.edit', $marhala->id)->with('success', 'Marhala updated successfully');
    }





    public function marhalaList()
    {
        $marhalas = Marhala::withCount([
            'subjects as total_subjects',
            'subjects as male_subjects' => function($q) {
                $q->where('status', 'SRtype_1');
            },
            'subjects as female_subjects' => function($q) {
                $q->where('status', 'SRtype_0');
            },
            'subjects as both_subjects' => function($q) {
                $q->where('status', 'both');
            }
        ])->get();
        dd($marhalas);
        return Inertia::render('Marhala/List', [
            'marhalas' => $marhalas
        ]);
    }


}



