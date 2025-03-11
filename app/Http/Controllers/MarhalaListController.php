<?php

namespace App\Http\Controllers;
use App\Models\admin\marhala_for_admin\Marhala;
use App\Models\admin\marhala_for_admin\MarhalaSubject;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class MarhalaListController extends Controller
{


    // public function marhalaList()
    // {
    //     $marhalas = Marhala::select('id', 'marhala_name_bn')
    //         ->withCount([
    //             'subjects as total_subjects',
    //             'subjects as male_subjects' => function ($query) {
    //                 $query->where('status', 'SRtype_1');
    //             },
    //             'subjects as female_subjects' => function ($query) {
    //                 $query->where('status', 'SRtype_0');
    //             },
    //             'subjects as both_subjects' => function ($query) {
    //                 $query->where('status', 'both');
    //             },
    //         ])
    //         ->get()

     

    //     return Inertia::render('Mrahala_for_Admin/marhala_details_list', [
    //         'marhalas' => $marhalas
    //     ]);
    // }





    // public function marhalaList()
    // {
    //     $marhalas = DB::table('marhalas')
    //         ->leftJoin('marhala_subjects', 'marhalas.id', '=', 'marhala_subjects.marhala_id')
    //         ->select(
    //             'marhalas.id',
    //             'marhalas.marhala_name_bn',
    //             DB::raw('COUNT(marhala_subjects.id) as total_subjects'),
    //             DB::raw('COUNT(CASE WHEN marhala_subjects.status = "SRtype_1" THEN 1 END) as male_subjects'),
    //             DB::raw('COUNT(CASE WHEN marhala_subjects.status = "SRtype_0" THEN 1 END) as female_subjects'),
    //             DB::raw('COUNT(CASE WHEN marhala_subjects.status = "both" THEN 1 END) as both_subjects')
    //         )
    //         ->groupBy('marhalas.id', 'marhalas.marhala_name_bn')
    //         ->get();

    //     return Inertia::render('Mrahala_for_Admin/marhala_details_list', [
    //         'marhalas' => $marhalas
    //     ]);
    // }

}
