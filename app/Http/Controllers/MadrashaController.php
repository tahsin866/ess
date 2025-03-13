<?php

namespace App\Http\Controllers;
use App\Models\madrasha;
use Inertia\Inertia;
use App\Models\Madrasa;
use App\Models\Division;
use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use App\Exports\MadrasaExport;
use Maatwebsite\Excel\Facades\Excel;

class MadrashaController extends Controller
{
    //
    public function getMadrashaList(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $applications = Madrasha::query()
            ->select(/* your fields */)
            ->paginate($perPage);

        // Calculate proper from-to values
        $applications->from = ($page - 1) * $perPage + 1;
        $applications->to = min($page * $perPage, $applications->total());


        $applications = madrasha::select(
            'id',
            'MName_uni as name',
            'ElhaqNo as Elhaq_no',
            'MType',
            'markaz_serial',
            'Mobile as mobile_no',
            'division',
            'district',
            'Thana_uni as thana'
        )->paginate($perPage);

        $applications->getCollection()->transform(function ($app) {
            $app->MType = $app->MType == 0 ? 'ছাত্রী' : 'ছাত্র';
            return $app;
        });

        return response()->json($applications);
    }





    public function index(Request $request)
    {
        $query = madrasha::query()
            ->select('madrashas.*', 'divisions.divisionUni', 'districts.District_U', 'thanas.Thana_U')
            ->leftJoin('divisions', 'madrashas.division_id', '=', 'divisions.id')
            ->leftJoin('districts', 'madrashas.district_id', '=', 'districts.Des_ID')
            ->leftJoin('thanas', 'madrashas.thana_id', '=', 'thanas.id');

        if ($request->searchTerm) {
            $query->where(function($q) use ($request) {
                $q->where('MName_uni', 'LIKE', '%' . $request->searchTerm . '%')
                  ->orWhere('ElhaqNo', 'LIKE', '%' . $request->searchTerm . '%');
            });
        }

        if ($request->type) {
            $query->where('MType', $request->type);
        }

        if ($request->stage) {
            $query->where('Stage', $request->stage);
        }

        if ($request->division) {
            $query->where('madrashas.division_id', $request->division);
        }

        if ($request->district) {
            $query->where('madrashas.district_id', $request->district);
        }

        if ($request->thana) {
            $query->where('madrashas.thana_id', $request->thana);
        }

        return $query->paginate($request->per_page ?? 10);
    }

    public function getDivisions()
    {
        // Shows: ID=3, Division_U="সিলেট"
        return Division::select('id', 'divisionUni as Division_U')->get();
    }

    public function getDistricts($divisionId)
    {
        // Shows districts where DID=3 (Sylhet Division)
        // Example: District_U="সুনামগঞ্জ", "মৌলভীবাজার", "হবিগঞ্জ", "সিলেট"
        return District::select('DesID', 'District_U')
            ->where('DID', $divisionId)  // DID=3 for Sylhet
            ->get();
    }

    public function getThanas($district_Id)
    {
        // Shows thanas where Des_ID matches selected district's Des_ID
        // Example for Sylhet: "দক্ষিণ সুরমা", "বালাগঞ্জ", etc
        return Thana::select('Des_ID', 'Thana_U')
            ->where('Des_ID', $district_Id)
            ->get();
    }

    }
















