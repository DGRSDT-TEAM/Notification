<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notificationrequest;
use App\Models\Etablissement;
use App\Models\Labo;
use App\Models\Inscription;
use App\Models\NatureOperation;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('etablissement', 'labo','inscriptions')->get();

        // dd($notifications[0]->inscriptions);
        return view('dashboard.notif.index', compact('notifications'));
    }

    public function create()
    {
        $etablissement = Etablissement::all();
        $labos = Labo::orderBy("labo_name")->get();
        //dd($labos);
        $natureOperations = NatureOperation::all();
        //dd($etablissement[0]);
        return view('dashboard.notif.create', compact('etablissement', 'natureOperations', 'labos'));
    }

    public function store(Notificationrequest $request)
    {

        // dd($request->all());
        try {

            DB::beginTransaction();

            //validation


            $notif = Notification::create([
                'etablissement_id' => $request->etablissement_id,
                'labo_id' => $request->labo_id,
                'label' => $request->label,
                'date' => $request->date_notif,
                'num' => $request->num,
                'montant' => $request->montant,
                'nature_operation' => $request->nature_operation,
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

    public function inscriptionStore(Request $request)
    {

        // dd($request->all());
        try {

            DB::beginTransaction();

            //validation


            $notif = Inscription::create([

                'num' => $request->num_inscription,
                'date' => $request->date_inscription,
                'montant' => $request->montant_inscription,
                'note' => $request->note_inscription,
                'notification_id' => $request->id_notification,
                'added_by' => 1,
            ]);


            $notif->save();

            //save product categories
            DB::commit();
            return redirect()->route('notif.index');


        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
            return redirect()->route('notif.index');
        }
    }

    public function inscriptionDelete(Request $request)
    {


    }

    public function destroy(Request $request)
    {
        $inscriptions = Inscription::where('notification_id', $request->id)->pluck('notification_id');

        try {
            DB::beginTransaction();
            Notification::findOrFail($request->id)->delete();
            if ($inscriptions->count() > 0) {
                Inscription::whereIn('notification_id', $inscriptions)->delete();

            }
            DB::commit();
            //toastr()->error(trans('messages.Delete'));
            return redirect()->route('notif.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('notif.index');
            //toastr()->error(trans('messages.Delete'));
        }


    }
}
