<?php

namespace App\Http\Controllers;
use App\Models\MarkazAgreement;
use App\Models\MarkazAgreementMadrasa;
use App\Models\admin\marhala_for_admin\ExamSetup;
use App\Models\Madrasha;
use App\Models\schedule_setups;
use App\Models\activity_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Inertia\Inertia;

class MarkazAgreementController extends Controller
{


    public function index()
    {
        $agreements = MarkazAgreement::with('associatedMadrasas')->latest()->paginate(10);

        return inertia('Markaz/markaz_agreement_form', [
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
        $markazAgreement->madrasha_Name = $user->madrasha_name;
        // $markazAgreement->user_name = $user->name;
        $markazAgreement->madrasha_code = $user->custom_code;
        $markazAgreement->exam_id = $examSetup->id;
        $markazAgreement->exam_name = $examSetup->exam_name;

        // Madrasha related data
        $markazAgreement->division = $madrashaData?->division ?? '';
        $markazAgreement->division_id = $madrashaData?->division_id ?? 0;
        $markazAgreement->district = $madrashaData?->district ?? '';
        $markazAgreement->district_id = $madrashaData?->district_Id ?? 0;
        $markazAgreement->mtype = $madrashaData?->MType ?? 0;
        $markazAgreement->Stage = $madrashaData?->Stage ?? 0;  // Set default to 0 for Stage column
        $markazAgreement->thana_uni = $madrashaData?->Thana_uni ?? '';
        $markazAgreement->tid = $madrashaData?->TID ?? 0;
        $markazAgreement->Elhaq_no = $madrashaData?->ElhaqNo ?? '';

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
        $agreements = MarkazAgreement::with(['associatedMadrasas', 'activityLogs'])
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

                // Get the latest activity log status
                $latestActivityLog = $agreement->activityLogs->sortByDesc('created_at')->first();

                return [
                    'id' => $agreement->id,
                    'application_date' => $agreement->created_at->format('d/m/Y'),
                    'main_madrasa' => $agreement->madrasha_Name,
                    'exam_name' => $agreement->exam_name,
                    'associated_madrasas' => $agreement->associatedMadrasas->pluck('madrasa_Name'),
                    'main_total_students' => $agreement->total_students,
                    'associated_total_students' => $associatedMadrasasTotal,
                    'status' => $latestActivityLog ? $latestActivityLog->status : 'পেন্ডিং' // Using activity log status
                ];
            });

        return response()->json([
            'agreements' => $agreements
        ]);
    }





    public function viewDetails($id)
    {
        $markazDetails = MarkazAgreement::with([
            'associatedMadrasas',
          'activityLogs' => function ($query) {
            $query->select(
                'id',
                'markaz_agreement_id',
                'user_name',
                'admin_name',
                'user_position',
                // 'admin_name',
                'admin_message',
                'status',      // Add this
                'created_at'   // Add this if needed
            );
        }
        ])->select(
            'id',
            'madrasha_Name',
            'markaz_type',
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
        )->findOrFail($id);

        // Format dates and set URLs for files
        $markazDetails->created_at = $markazDetails->created_at->format('d/m/Y');
        $markazDetails->president_consent = $markazDetails->president_consent ? Storage::url($markazDetails->president_consent) : null;
        $markazDetails->resolution_file = $markazDetails->resolution_file ? Storage::url($markazDetails->resolution_file) : null;



        return inertia('Markaz/marjaz_detailes_view', [
            'markazDetails' => $markazDetails
        ]);
    }







    // public function submitToBoard($id)
    // {
    //     $markaz = MarkazAgreement::findOrFail($id);
    //     $markaz->update([
    //         'status' => 'submitted',
    //         'submitted_at' => now()
    //     ]);

    //     return redirect()->back()->with('success', 'আবেদনটি বোর্ডে জমা দেওয়া হয়েছে');
    // }

    // public function processApplication(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'status' => 'required|in:approved,rejected,returned',
    //         'feedback' => 'required|string'
    //     ]);

    //     $markaz = MarkazAgreement::findOrFail($id);
    //     $markaz->update([
    //         'status' => $validated['status'],
    //         'admin_feedback' => $validated['feedback'],
    //         'processed_at' => now()
    //     ]);

    //     return redirect()->back()->with('success', 'আবেদনটি প্রক্রিয়া করা হয়েছে');
    // }





// এডমিন ডাটা  ফেচ


    public function fatch()
    {
        $agreements = MarkazAgreement::with(['associatedMadrasas', 'activityLogs'])  // Add activityLogs relation
            ->whereHas('activityLogs', function ($query) {  // Ensure activity log exists with 'সাবমিটেড' status
                $query->where('status', 'বোর্ড দাখিল');
            })
            ->latest()
            ->get()
            ->map(function ($agreement) {
                // Get the latest activity log status
                $latestActivityLog = $agreement->activityLogs->sortByDesc('created_at')->first();

                return [
                    'id' => $agreement->id,
                    'number' => $agreement->id,
                    // 'name' => $agreement->user_name,
                    'Elhaq_no' => $agreement->Elhaq_no,
                    'markaz_type' => $agreement->markaz_type,
                    'madrasha_Name' => $agreement->madrasha_Name,
                    'status' => $latestActivityLog ? $latestActivityLog->status : 'পেন্ডিং', // Use status from activity_log
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




    // public function submitApplication($id)
    // {
    //     $agreement = MarkazAgreement::find($id);

    //     if (!$agreement) {
    //         return back()->withErrors(['error' => 'আবেদন পাওয়া যায়নি!']);
    //     }

    //     // Update agreement status
    //     // $agreement->update([
    //     //     'status' => 'সাবমিটেড',
    //     //     'submitted_at' => now()
    //     // ]);

    //     // Create activity log with all required fields
    //     activity_log::create([
    //         'markaz_agreement_id' => $agreement->id,  // Ensure this value is correctly passed
    //         'user_id' => Auth::user()->id,
    //         'status' => 'বোর্ড দাখিল',
    //         'actor_type' => 'user',
    //         'user_name' => Auth::user()->name,
    //         'user_position' => Auth::user()->admin_Designation,
    //         'admin_position' => null,  // You can set null or a default value
    //         'admin_message' => null,
    //         'admin_feedback_image' => null,
    //         'created_at' => now(),
    //         'updated_at' => now()
    //     ]);

    //     return back()->with('success', 'আবেদন সফলভাবে সাবমিট হয়েছে!');
    // }



    public function submitApplication($id)
    {
        // 1️⃣ First check markaz_agreements table
        $agreement = MarkazAgreement::find($id);
        if (!$agreement) {
            return back()->withErrors(['error' => 'আবেদন পাওয়া যায়নি!']);
        }

        // 2️⃣ Now check schedule timing before anything else
        $schedule = schedule_setups::where('exam_setup_id', $agreement->exam_id)
            ->where('schedule_type', 'মারকায আবেদন')
            ->where('is_active', true)
            ->first();

        if (!$schedule) {
            return back()->withErrors(['error' => 'সময়সূচী পাওয়া যায়নি!']);
        }

        $currentDate = now();
        $startDate = \Carbon\Carbon::parse($schedule->start_date);
        $endDate = \Carbon\Carbon::parse($schedule->end_date);

        if ($currentDate->lt($startDate)) {
            return back()->withErrors(['error' => 'আবেদনের সময় শুরু হয়নি! ' . $startDate->format('d-m-Y') . ' তারিখে আবার চেষ্টা করুন।']);
        }

        if ($currentDate->gt($endDate)) {
            return back()->withErrors(['error' => 'আবেদনের সময় শেষ! আগামী বছর আবার চেষ্টা করুন।']);
        }

        // 3️⃣ Then check if this agreement is already in activity_log
        $existingLog = activity_log::where('markaz_agreement_id', $id)
            ->where('status', 'বোর্ড দাখিল')
            ->first();

        if ($existingLog) {
            return back()->withErrors(['error' => 'এই আবেদনটি ইতিমধ্যে বোর্ড দাখিল করা হয়েছে!']);
        }

        // 4️⃣ If all checks pass, then create activity log
        activity_log::create([
            'markaz_agreement_id' => $agreement->id,
            'user_id' => Auth::user()->id,
            'status' => 'বোর্ড দাখিল',
            'actor_type' => 'user',
            'user_name' => Auth::user()->name,
            'user_position' => Auth::user()->admin_Designation,
            'admin_position' => null,
            'admin_message' => null,
            'admin_feedback_image' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return back()->with('success', 'আবেদন সফলভাবে সাবমিট হয়েছে!');
    }










// এডমিন পার্ট



public function viewDetails_for_admin($id)
{
    $markazDetails = MarkazAgreement::with('associatedMadrasas')
        ->select(
            'id',
            'markaz_type',

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










public function approveApplication($id)
{
    $agreement = MarkazAgreement::find($id);
    if (!$agreement) {
        return back()->withErrors(['error' => 'আবেদন পাওয়া যায়নি!']);
    }

    $agreement->update(['status' => 'অনুমোদিত']);

    return back()->with('success', 'আবেদন অনুমোদন করা হয়েছে!');
}



public function rejectApplication(Request $request, $id)
{
    // Find the agreement by ID
    $agreement = MarkazAgreement::find($id);

    // If the agreement is not found, return error
    if (!$agreement) {
        return back()->withErrors(['error' => 'আবেদন পাওয়া যায়নি!']);
    }

    $adminId = Auth::guard('admin')->id();
    $adminName = Auth::guard('admin')->user()->name;

    // Initialize feedback data
    $feedbackData = [
        'admin_id' => $adminId,
        'admin_name' => $adminName,
        'markaz_agreement_id' => $agreement->id,
        'status' => 'বোর্ড ফেরত', // Update status
        'admin_message' => $request->message, // Insert the admin's message
        'processed_at' => now(),
    ];

    // Check if an image is uploaded and store it
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/feedback', 'public');
        $feedbackData['admin_feedback_image'] = $imagePath; // Store the image path
    }

    // Insert the feedback into the activity_logs table
    $inserted = activity_log::create($feedbackData);

    // If the insert was successful, return success message
    if ($inserted) {
        return back()->with('success', 'আবেদন সফলভাবে ফেরত পাঠানো হয়েছে!');
    } else {
        return back()->withErrors(['error' => 'আপডেট করতে সমস্যা হয়েছে!']);
    }
}










public function Edit($id)
{
    // Get the main agreement with associated madrasas
    $markazAgreement = MarkazAgreement::with('associatedMadrasas')->findOrFail($id);

    return Inertia::render('Markaz/markaz_apply_edit', [
        'markazData' => $markazAgreement,
        'associatedMadrasas' => $markazAgreement->associatedMadrasas
    ]);
}







public function update(Request $request, $id)
{
    $markazAgreement = MarkazAgreement::findOrFail($id);

    // Update main agreement data
    $markazAgreement->update([
        'madrasa_Name' => $request->madrasa_Name,
        'markaz_type' => $request->markaz_type,
        'markaz_type' => $request->markaz_type,
        'fazilat' => $request->fazilat,
        'sanabiya_ulya' => $request->sanabiya_ulya,
        'sanabiya' => $request->sanabiya,
        'mutawassita' => $request->mutawassita,
        'ibtedaiyyah' => $request->ibtedaiyyah,
        'hifzul_quran' => $request->hifzul_quran,
        'requirements' => $request->requirements,
    ]);

    // Handle main agreement files
    $fileFields = [
        'noc_file' => 'markaz/noc',
        'resolution_file' => 'markaz/resolution',
        'muhtamim_consent' => 'markaz/consent',
        'president_consent' => 'markaz/consent',
        'committee_resolution' => 'markaz/consent'
    ];

    foreach ($fileFields as $field => $path) {
        if ($request->hasFile($field)) {
            if ($markazAgreement->$field) {
                Storage::delete($markazAgreement->$field);
            }
            $markazAgreement->$field = $request->file($field)->store($path);
        }
    }

    $markazAgreement->save();

    // Get IDs of existing associated madrasas
    $existingMadrasaIds = MarkazAgreementMadrasa::where('markaz_agreement_id', $id)
        ->pluck('id')
        ->toArray();

    // Get IDs of madrasas that should remain after update
    $updatedMadrasaIds = [];

    // Update or create associated madrasas
    foreach ($request->associated_madrasas as $madrasaData) {
        if (isset($madrasaData['id'])) {
            // Update existing madrasa
            $associatedMadrasa = MarkazAgreementMadrasa::find($madrasaData['id']);
            $updatedMadrasaIds[] = $madrasaData['id'];
        } else {
            // Create new madrasa
            $associatedMadrasa = new MarkazAgreementMadrasa();
            $associatedMadrasa->markaz_agreement_id = $id;
        }
        $associatedMadrasa->madrasa_Name = $madrasaData['madrasa_Name'];
        $associatedMadrasa->fazilat = $madrasaData['fazilat'];
        $associatedMadrasa->sanabiya_ulya = $madrasaData['sanabiya_ulya'];
        $associatedMadrasa->sanabiya = $madrasaData['sanabiya'];
        $associatedMadrasa->mutawassita = $madrasaData['mutawassita'];
        $associatedMadrasa->ibtedaiyyah = $madrasaData['ibtedaiyyah'];
        $associatedMadrasa->hifzul_quran = $madrasaData['hifzul_quran'];

        // Handle file uploads
        if (isset($madrasaData['noc_file']) && $madrasaData['noc_file'] instanceof UploadedFile) {
            if ($associatedMadrasa->noc_file) {
                Storage::delete($associatedMadrasa->noc_file);
            }
            $associatedMadrasa->noc_file = $madrasaData['noc_file']->store('markaz/associated/noc');
        }

        if (isset($madrasaData['resolution_file']) && $madrasaData['resolution_file'] instanceof UploadedFile) {
            if ($associatedMadrasa->resolution_file) {
                Storage::delete($associatedMadrasa->resolution_file);
            }
            $associatedMadrasa->resolution_file = $madrasaData['resolution_file']->store('markaz/associated/resolution');
        }

        $associatedMadrasa->save();
    }

    // Delete madrasas that are no longer in the request
    $madrasasToDelete = array_diff($existingMadrasaIds, $updatedMadrasaIds);
    MarkazAgreementMadrasa::whereIn('id', $madrasasToDelete)->delete();

    return redirect()->route('markaz-agreements.index')
        ->with('success', 'মারকায চুক্তি সফলভাবে আপডেট করা হয়েছে');
}


}
