<?php

namespace App\Http\Controllers;
use App\Models\madrasha;
use Illuminate\Http\Request;
use Inertia\Inertia;


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


    }
















