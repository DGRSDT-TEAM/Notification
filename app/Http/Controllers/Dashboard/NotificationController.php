<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notificationrequest;
use App\Models\Etablissement;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('etablissement')->get();
        //dd($notifications[0]->getEtab(1));
        return view('dashboard.notif.index', compact('notifications'));
    }

    public function create()
    {
        $etablissement = Etablissement::all();
        return view('dashboard.notif.create', compact('etablissement'));
    }

    public function store(Notificationrequest $request)
    {

        //dd($request->all());
        try {

            DB::beginTransaction();

            //validation


            $notif = Notification::create([
                'etablissement_id' => $request->etablissement_id,
                'entite_benif_id' => $request->entite_benif_id,
                'label' => $request->label,
                'date' => $request->date_notif,
                'num' => $request->num,
                'montant' => $request->montant,
                'added_by' => 1,
            ]);


            $notif->save();

            //save product categories
            DB::commit();
            return redirect()->route('notif.create')->with(['success' => 'تم ألاضافة بنجاح']);


        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
            return redirect()->route('notif.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy()
    {
        return view('dashboard.notif.index');
    }
}
