<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class EtablissemntController extends Controller
{
    public function index()
    {
        $etabs = Etablissement::all();
        return view('dashboard.etabs.index', compact('etabs'));

    }

    public function create()
    {
        return view('dashboard.etabs.index');
    }
}
