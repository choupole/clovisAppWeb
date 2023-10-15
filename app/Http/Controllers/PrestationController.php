<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestations = Prestation::all();

        return view('pages.prestations.index', compact('prestations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prestations = Prestation::all();

        return view('pages.enseignants.create', compact('prestations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libprest' => 'required',
            'datprest' => 'required',
        ]);

        Prestation::create($request->all());

        return redirect()->route('prestations.index')->with('success', 'Elève créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestation $prestation)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($prestation)
    {
        $prestation = Prestation::findOrFail($prestation);
        $prestations = Prestation::all();

        return view('pages.prestations.indexedit', compact('prestations', 'prestation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $prestation)
    {
        $request->validate([
            'libprest' => 'required',
            'datprest' => 'required',
        ]);
        $prestation = Prestation::findOrFail($prestation);
        $prestation->libprest = $request->input('libprest');
        $prestation->datprest = $request->input('datprest');
        $prestation->save();
        // $prestation->update($request->all());

        return redirect()->route('prestations.index')->with('success', 'prestation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prestation)
    {
        $prestation = Prestation::findOrFail($prestation);

        $prestation->delete();

        return redirect()->route('prestations.index')->with('info', 'Prestation supprimée avec succès.');
    }
}
