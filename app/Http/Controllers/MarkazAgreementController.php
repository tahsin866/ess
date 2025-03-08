<?php

namespace App\Http\Controllers;
use App\Models\MarkazAgreement;
use App\Models\MarkazAgreementMadrasa;
use App\Models\Madrasha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Create main agreement
        $markazAgreement = new MarkazAgreement();
        $markazAgreement->user_id = Auth::id();
        // Set main madrasa student counts
        $markazAgreement->markaz_type = $request->markaz_type;
        $markazAgreement->fazilat = $request->fazilat;
        $markazAgreement->sanabiya_ulya = $request->sanabiya_ulya;
        $markazAgreement->sanabiya = $request->sanabiya;
        $markazAgreement->mutawassita = $request->mutawassita;
        $markazAgreement->ibtedaiyyah = $request->ibtedaiyyah;
        $markazAgreement->hifzul_quran = $request->hifzul_quran;

        // Handle main madrasa files
        if ($request->hasFile('noc_file')) {
            $markazAgreement->noc_file = $request->file('noc_file')->store('markaz/noc');
        }

        if ($request->hasFile('resolution_file')) {
            $markazAgreement->resolution_file = $request->file('resolution_file')->store('markaz/resolution');
        }

        // Set requirements
        $markazAgreement->requirements = $request->requirements;

        // Handle consent files
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

            // Set student counts

            $associatedMadrasa->fazilat = $madrasaData['fazilat'];
            $associatedMadrasa->sanabiya_ulya = $madrasaData['sanabiya_ulya'];
            $associatedMadrasa->sanabiya = $madrasaData['sanabiya'];
            $associatedMadrasa->mutawassita = $madrasaData['mutawassita'];
            $associatedMadrasa->ibtedaiyyah = $madrasaData['ibtedaiyyah'];
            $associatedMadrasa->hifzul_quran = $madrasaData['hifzul_quran'];

            // Handle files
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
        $agreements = MarkazAgreement::with('associatedMadrasas')
        ->latest()
        ->paginate(10);

    return inertia('MarkazAgreement/Index', [
        'agreements' => $agreements
    ]);
    }



}
