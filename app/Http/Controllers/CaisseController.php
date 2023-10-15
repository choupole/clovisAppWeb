<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caisses = Caisse::all();

        return view('pages.caisses.index', compact('caisses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codcais' => 'required',
            'libcais' => 'required',
        ]);

        Caisse::create($request->all());

        return redirect()->route('caisses.index')->with('success', 'Caisse créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caisse $caisse)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($caisse)
    {
        $caisses = Caisse::all();
        $caisse = Caisse::findOrFail($caisse);

        return view('pages.caisses.indexedit', compact('caisse', 'caisses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $caisse)
    {
        $request->validate([
            'codcais' => 'required',
            'libcais' => 'required',
        ]);
        $caisse = caisse::findOrFail($caisse);
        $caisse->codcais = $request->input('codcais');
        $caisse->libcais = $request->input('libcais');
        $caisse->save();
        // $caisse->update($request->all());

        return redirect()->route('caisses.index')->with('success', 'Elève mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $caisse = Caisse::findOrFail($id);

        $caisse->delete();

        return redirect()->route('caisses.index')->with('info', 'Caisse supprimée avec succès.');
    }
}
