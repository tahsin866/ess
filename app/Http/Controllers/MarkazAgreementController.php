<?php

namespace App\Http\Controllers;
use App\Models\MarkazAgreement;
use App\Models\MarkazAgreementMadrasa;
use App\Models\admin\marhala_for_admin\ExamSetup;
use App\Models\Madrasha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MarkazAgreementController extends Controller
{


    public function index()
    {
        $agreements = MarkazAgreement::with('associatedMadrasas')->latest()->paginate(10);

        return inertia('MarkazAgreement/Index', [
            'agreements' => $agreements
        ]);
    }


    public function store(Request $request)
    {
        // Get user with madrasha relationship
        $user = Auth::user();
        $madrashaData = Madrasha::where('id', $user->madrasha_id)->first();


        // Get exam setup data
        $examSetup = ExamSetup::select('id', 'exam_name')->latest()->first();

        // Create main agreement
        $markazAgreement = new MarkazAgreement();

        // User and Exam related data
        $markazAgreement->user_id = $user->id;
        $markazAgreement->user_name = $user->madrasha_name;
        $markazAgreement->madrasha_code = $user->custom_code;
        $markazAgreement->exam_id = $examSetup->id;
        $markazAgreement->exam_name = $examSetup->exam_name;

        // Madrasha related data
        $markazAgreement->division = $madrashaData->division;
        $markazAgreement->division_id = $madrashaData->division_id;
        $markazAgreement->district = $madrashaData->district;
        $markazAgreement->district_id = $madrashaData->district_Id;
        $markazAgreement->mtype = $madrashaData->MType;
        $markazAgreement->Stage = $madrashaData->Stage;
        $markazAgreement->thana_uni = $madrashaData->Thana_uni;
        $markazAgreement->tid = $madrashaData->TID;
        $markazAgreement->Elhaq_no = $madrashaData->ElhaqNo;

        // Student counts
        $markazAgreement->markaz_type = $request->markaz_type;
        $markazAgreement->fazilat = $request->fazilat;
        $markazAgreement->sanabiya_ulya = $request->sanabiya_ulya;
        $markazAgreement->sanabiya = $request->sanabiya;
        $markazAgreement->mutawassita = $request->mutawassita;
        $markazAgreement->ibtedaiyyah = $request->ibtedaiyyah;
        $markazAgreement->hifzul_quran = $request->hifzul_quran;

        // File handling
        if ($request->hasFile('noc_file')) {
            $markazAgreement->noc_file = $request->file('noc_file')->store('markaz/noc');
        }

        if ($request->hasFile('resolution_file')) {
            $markazAgreement->resolution_file = $request->file('resolution_file')->store('markaz/resolution');
        }

        // Requirements
        $markazAgreement->requirements = $request->requirements;

        // Consent files
        if ($request->hasFile('muhtamim_consent')) {
            $markazAgreement->muhtamim_consent = $request->file('muhtamim_consent')->store('markaz/consent');
        }

        if ($request->hasFile('president_consent')) {
            $markazAgreement->president_consent = $request->file('president_consent')->store('markaz/consent');
        }

        if ($request->hasFile('committee_resolution')) {
            $markazAgreement->committee_resolution = $request->file('committee_resolution')->store('markaz/consent');
        }

        $markazAgreement->save();

        // Handle associated madrasas
        foreach ($request->associated_madrasas as $madrasaData) {
            $associatedMadrasa = new MarkazAgreementMadrasa();
            $associatedMadrasa->markaz_agreement_id = $markazAgreement->id;
            $associatedMadrasa->madrasa_Name = $madrasaData['madrasa_Name'];

            // Student counts
            $associatedMadrasa->fazilat = $madrasaData['fazilat'];
            $associatedMadrasa->sanabiya_ulya = $madrasaData['sanabiya_ulya'];
            $associatedMadrasa->sanabiya = $madrasaData['sanabiya'];
            $associatedMadrasa->mutawassita = $madrasaData['mutawassita'];
            $associatedMadrasa->ibtedaiyyah = $madrasaData['ibtedaiyyah'];
            $associatedMadrasa->hifzul_quran = $madrasaData['hifzul_quran'];

            // File handling
            if (isset($madrasaData['noc_file'])) {
                $associatedMadrasa->noc_file = $madrasaData['noc_file']->store('markaz/associated/noc');
            }

            if (isset($madrasaData['resolution_file'])) {
                $associatedMadrasa->resolution_file = $madrasaData['resolution_file']->store('markaz/associated/resolution');
            }

            $associatedMadrasa->save();
        }

        return redirect()->route('markaz-agreements.index')
                        ->with('success', 'মারকায চুক্তি সফলভাবে সংরক্ষণ করা হয়েছে');
    }








    public function getMadrashas()
    {
        $madrashas = Madrasha::select('id', 'MName_uni as name', 'ElhaqNo')
            ->orderBy('MName_uni')
            ->get();

        return response()->json($madrashas);
    }


    public function getTableData()
    {
        $agreements = MarkazAgreement::with(['associatedMadrasas'])
            ->where('user_id', Auth::id())
            ->select('markaz_agreements.*')
            ->selectRaw('(fazilat + sanabiya_ulya + sanabiya + mutawassita + ibtedaiyyah + hifzul_quran) as total_students')
            ->latest()
            ->get()
            ->map(function ($agreement) {
                $associatedMadrasasTotal = $agreement->associatedMadrasas->sum(function ($madrasa) {
                    return $madrasa->fazilat +
                           $madrasa->sanabiya_ulya +
                           $madrasa->sanabiya +
                           $madrasa->mutawassita +
                           $madrasa->ibtedaiyyah +
                           $madrasa->hifzul_quran;
                });

                return [
                    'id' => $agreement->id,
                    'application_date' => $agreement->created_at->format('d/m/Y'),
                    'main_madrasa' => $agreement->user_name,
                    'exam_name' => $agreement->exam_name,
                    'associated_madrasas' => $agreement->associatedMadrasas->pluck('madrasa_Name'),
                    'main_total_students' => $agreement->total_students,
                    'associated_total_students' => $associatedMadrasasTotal,
                    'status' => $agreement->status ?? 'পেন্ডিং'
                ];
            });

        return response()->json([
            'agreements' => $agreements
        ]);
    }



    public function viewDetails($id)
    {
        $markazDetails = MarkazAgreement::with('associatedMadrasas')
            ->select(
                'id',
                'markaz_type',
                'user_name',
                'created_at',
                'fazilat',
                'sanabiya_ulya',
                'sanabiya',
                'mutawassita',
                'ibtedaiyyah',
                'hifzul_quran',
                'noc_file',
                'resolution_file',
                'requirements',
                'muhtamim_consent',
                'president_consent',
                'committee_resolution',
                'user_id',
                'exam_id',
                'exam_name'
            )
            ->findOrFail($id);

        $markazDetails->created_at = $markazDetails->created_at->format('d/m/Y');
        $markazDetails->president_consent = $markazDetails->president_consent ? Storage::url($markazDetails->president_consent) : null;
        $markazDetails->resolution_file = $markazDetails->resolution_file ? Storage::url($markazDetails->resolution_file) : null;

        return inertia('Markaz/marjaz_detailes_view', [
            'markazDetails' => $markazDetails
        ]);
    }





    public function submitToBoard($id)
    {
        $markaz = MarkazAgreement::findOrFail($id);
        $markaz->update([
            'status' => 'submitted',
            'submitted_at' => now()
        ]);

        return redirect()->back()->with('success', 'আবেদনটি বোর্ডে জমা দেওয়া হয়েছে');
    }

    public function processApplication(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,returned',
            'feedback' => 'required|string'
        ]);

        $markaz = MarkazAgreement::findOrFail($id);
        $markaz->update([
            'status' => $validated['status'],
            'admin_feedback' => $validated['feedback'],
            'processed_at' => now()
        ]);

        return redirect()->back()->with('success', 'আবেদনটি প্রক্রিয়া করা হয়েছে');
    }










    public function fatch()
    {
        $agreements = MarkazAgreement::with('associatedMadrasas')
            ->where('status', 'সাবমিটেড') // শুধুমাত্র 'সাবমিটেড' থাকা ডাটা ফিল্টার করলাম
            ->get()
            ->map(function ($agreement) {
                return [
                    'id' => $agreement->id,
                    'number' => $agreement->id,
                    'name' => $agreement->user_name,
                    'Elhaq_no' => $agreement->Elhaq_no,
                    'markaz_type' => $agreement->markaz_type,
                    'status' => $agreement->status,
                    'madrasha_code' => $agreement->madrasha_code,
                    'studentNumber' => $agreement->fazilat +
                                       $agreement->sanabiya_ulya +
                                       $agreement->sanabiya +
                                       $agreement->mutawassita +
                                       $agreement->ibtedaiyyah +
                                       $agreement->hifzul_quran +
                                       $agreement->associatedMadrasas->sum('fazilat') +
                                       $agreement->associatedMadrasas->sum('sanabiya_ulya') +
                                       $agreement->associatedMadrasas->sum('sanabiya') +
                                       $agreement->associatedMadrasas->sum('mutawassita') +
                                       $agreement->associatedMadrasas->sum('ibtedaiyyah') +
                                       $agreement->associatedMadrasas->sum('hifzul_quran'),
                    'madrasahNumber' => $agreement->associatedMadrasas->count(),
                    'boardStatus' => 'Pending' // Placeholder status
                ];
            });

        return response()->json($agreements);
    }








    public function submitApplication($id)
{
    $agreement = MarkazAgreement::find($id);
    if (!$agreement) {
        return back()->withErrors(['error' => 'আবেদন পাওয়া যায়নি!']);
    }

    $agreement->update(['status' => 'সাবমিটেড']);


    return back()->with('success', 'আবেদন সফলভাবে সাবমিট হয়েছে!');
}





// এডমিন পার্ট



public function viewDetails_for_admin($id)
{
    $markazDetails = MarkazAgreement::with('associatedMadrasas')
        ->select(
            'id',
            'markaz_type',
            'user_name',
            'created_at',
            'fazilat',
            'sanabiya_ulya',
            'sanabiya',
            'mutawassita',
            'ibtedaiyyah',
            'hifzul_quran',
            'noc_file',
            'resolution_file',
            'requirements',
            'muhtamim_consent',
            'president_consent',
            'committee_resolution',
            'user_id',
            'exam_id',
            'exam_name'
        )
        ->findOrFail($id);

    $markazDetails->created_at = $markazDetails->created_at->format('d/m/Y');
    $markazDetails->president_consent = $markazDetails->president_consent ? Storage::url($markazDetails->president_consent) : null;
    $markazDetails->resolution_file = $markazDetails->resolution_file ? Storage::url($markazDetails->resolution_file) : null;

    return inertia('markaz_for_admin/markaz_apply_details_view', [
        'markazDetails' => $markazDetails
    ]);
}



}
