<?php

namespace App\Http\Controllers;

use App\Models\Storing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Status update

        $totaleStoringen = Storing::count();
        $openStoringen = Storing::whereIn('statusupdate_id', function ($query) {
            $query->select('id')
            ->from('statusupdate')
            ->whereIn('updatenaam', ['open', 'in behandeling']);
        })  ->count();
        
        $aantalAfgehandeldStoringen = Storing::where('statusupdate_id', '=', DB::raw('(SELECT id FROM statusupdate WHERE updatenaam = "afgehandeld")')) ->count();
       
        $storingen = Storing::where('statusupdate_id', '<>', 3)->get();
        $afgehandeldStoringen = Storing::where('statusupdate_id', '=', 3)->get();

        
        return view('pages.dashboard', [
            'totaleStoringen' => $totaleStoringen,
            'openStoringen' => $openStoringen,
            'aantalAfgehandeldStoringen' => $aantalAfgehandeldStoringen,
            'storingen' => $storingen,
            'afgehandeldStoringen' => $afgehandeldStoringen
        ]);
    }
    public function update(Request $request, $id)
    {
        $storing = Storing::findOrFail($id);
        $storing->machine_id = $request->machine_id;
        $storing->statusniveau_id = $request->statusniveau_id;
        $storing->statusupdate_id = 3;
        $storing->description = $request->description;
        $storing->save();
        return redirect('/')->with('error', 'Storing is afgehandeld!');
    }

}
