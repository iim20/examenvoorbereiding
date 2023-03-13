<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Models\Medewerker;
use App\Models\Storing;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = 'SELECT storingen.id , storingen.naam, medewerker.naam, statusupdate.name, statusniveau.name 
                   FROM storingen
                   INNER JOIN medewerkers on medewerkers.id = storingen.medewerker_id
                   INNER JOIN statusupdates on statusupdates.id = storingen.statusupdate_id
                   INNER JOIN statusniveau on statusniveau.id = storingen.statusniveau_id
                   WHERE statusupdate_id <> 3';

        $medewerker = request('medewerker');
        $status_update = request('status_update');
        $status_niveau = request('status_niveau');

        $storingen = Storing::query();

        if ($medewerker) {
            $storingen->join('medewerkers', 'medewerkers.id', '=', 'storingen.medewerker_id')
                      ->where('medewerkers.naam', $medewerker);
        }

        if ($status_update) {
            $storingen->join('statusupdate', 'statusupdate.id', '=', 'storingen.statusupdate_id')
                      ->where('statusupdate.updatenaam', $status_update);
        }
    
        if ($status_niveau) {
            $storingen->join('statusniveau', 'statusniveau.id', '=', 'storingen.statusniveau_id')
                      ->where('statusniveau.niveaunaam', $status_niveau);
        }
        
        $storingen = $storingen->where('statusupdate_id', '<>', 3)
        ->orderBy('storingen.created_at', 'desc')
        ->paginate(10, ['storingen.id as storingId', 'storingen.description', 'medewerker_id', 'machine_id', 'statusniveau_id', 'statusupdate_id' ]);
        
          // Append the filters to the pagination links
        $storingen->appends([
            'medewerker' => $medewerker,
            'status_update' => $status_update,
            'status_niveau' => $status_niveau,
        ]);

        return view('pages.storingen.index', compact('storingen'));

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.storingen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormRequest $request)
    {
        $description = $request->input('description');
        $machineId = $request->input('machine_id');
        $statusniveauId = $request->input('statusniveau_id');
        $statusupdateId = $request->input('statusupdate_id');
        $medewerkerId = $request->input('medewerker_id');
    
        // Check if the status is critical and if the medewerker is a voorman
        if ($statusniveauId === '3') {
            $voormanMedewerker = Medewerker::where('positie', '=', 'voorman')->where('id', '=', $medewerkerId)->exists();
            if (!$voormanMedewerker) {
                // Show error message
                return back()->withErrors(['statusniveau_id' => 'Only voorman can create a critical storing']);
            }
        }
    
        // Save the storing
        $storing = new Storing();
        $storing->machine_id = $machineId;
        $storing->statusniveau_id = $statusniveauId;
        $storing->statusupdate_id  = $statusupdateId;
        $storing->medewerker_id  = $medewerkerId;
        $storing->description = $description;
    
        $storing->save();
    
        return redirect('/storingen')->with('success', 'Storing created successfully!');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $storing = Storing::findOrFail($id);
        return view('pages.storingen.show', compact('storing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $storing = Storing::findOrFail($id);
        return view('pages.storingen.edit', compact('storing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $statusniveauId = $request->statusniveau_id;
        $medewerkerId = $request->medewerker_id;
        // Check if the status is critical and if the medewerker is a voorman
        if ($statusniveauId === '3') {
            $voormanMedewerker = Medewerker::where('positie', '=', 'voorman')->where('id', '=', $medewerkerId)->exists();
            if (!$voormanMedewerker) {
                // Show error message
                return back()->withErrors(['statusniveau_id' => 'Only voorman can be assigned to critical storing']);
            }
        }
        $storing = Storing::findOrFail($id);
        $storing->machine_id = $request->machine_id;
        $storing->statusniveau_id = $request->statusniveau_id;
        $storing->statusupdate_id = $request->statusupdate_id;
        $storing->medewerker_id = $request->medewerker_id;
        $storing->description = $request->description;
        $storing->save();
        return redirect('/')->with('success', 'Storing is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Storing $storing, $id)
    {
        $storing = Storing::findOrFail($id);
        if ($storing->statusupdate_id != 1) {
            $storing::destroy($id);
            return redirect('storingen')->with('destroy', 'Storing is verwijderd!');
        } else {
            return redirect('storingen')->with('error', 'Storing kan niet worden verwijderd omdat de storing OPEN!');
        }
    }
}
