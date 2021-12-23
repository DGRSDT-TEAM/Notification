<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Entite;
use Illuminate\Http\Request;

class EntiteController extends Controller
{
    public function index()
    {
        $entites = Entite::all();
        return view('dashboard.entites.index', compact('entites'));

    }

    public function create()
    {
        return view('dashboard.entites.index');
    }
}
