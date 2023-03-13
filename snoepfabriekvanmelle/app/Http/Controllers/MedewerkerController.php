<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medewerker;


class MedewerkerController extends Controller
{
    public function index()
    {
        $medewerkers = Medewerker::all();
        return view('pages.medewerkers.index', compact('medewerkers'));
    }
    public function show($id)
    {
        $medewerker = Medewerker::findOrFail($id);
        return view('pages.medewerkers.show', compact('medewerker'));
    }
}
