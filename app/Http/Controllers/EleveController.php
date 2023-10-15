<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::all();

        return view('pages.eleves.index', compact('eleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classe::all();

        return view('pages.eleves.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
        ]);

        Eleve::create($request->all());

        return redirect()->route('eleves.index')->with('success', 'Elève créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eleve)
    {
        // Récupérer les détails de l'élève à partir de l'ID
        $eleve = Eleve::findOrFail($eleve);
        $classes = Classe::all();

        // Passer les détails de l'élève à la vue d'édition
        return view('pages.eleves.edit', compact('eleve', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $eleve)
    {
        $request->validate([
            'nom' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'codclas' => 'required',
        ]);
        $eleve = Eleve::findOrFail($eleve);
        $eleve->nom = $request->input('nom');
        $eleve->postnom = $request->input('postnom');
        $eleve->prenom = $request->input('prenom');
        $eleve->sexe = $request->input('sexe');
        $eleve->codclas = $request->input('codclas');
        $eleve->save();
        // $eleve->update($request->all());

        return redirect()->route('eleves.index')->with('success', 'Elève mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);

        $eleve->delete();

        return redirect()->route('eleves.index')->with('info', 'Elève supprimé avec succès.');
    }

    public function printEleves()
    {
        $eleves = Eleve::with('classe')->get();

        return view('pages.eleves.print', compact('eleves'));
    }
}
