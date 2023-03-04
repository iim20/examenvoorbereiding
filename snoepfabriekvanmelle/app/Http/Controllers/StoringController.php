<?php

namespace App\Http\Controllers;

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
        $storingen = Storing::where('statusupdate_id', '<>', 3)->get();
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
    public function store(Request $request)
    {
        $description = $request->input('description');
        $machineId = $request->input('machine_id');
        $statusniveauId = $request->input('statusniveau_id');
        $statusupdateId = $request->input('statusupdate_id');
        
        $storing = new Storing();
        $storing->machine_id = $machineId;
        $storing->statusniveau_id = $statusniveauId;
        $storing->statusupdate_id  = $statusupdateId;
        $storing->description = $description;

        $storing->save();

        return redirect('/storingen')->with('success', 'Storing created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Storing $storing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $storing = Storing::find($id);
        return view('pages.storingen.edit', compact('storing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $storing = Storing::findOrFail($id);
        $storing->machine_id = $request->machine_id;
        $storing->statusniveau_id = $request->statusniveau_id;
        $storing->statusupdate_id = $request->statusupdate_id;
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
