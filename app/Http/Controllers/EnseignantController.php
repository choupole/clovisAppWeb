<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants = Enseignant::all();

        return view('pages.enseignants.index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caisses = Caisse::all();

        return view('pages.enseignants.create', compact('caisses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'codcais' => 'required',
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index')->with('success', 'Enseignant ajouté avec succès.');
    }

    public function print($enseignant)
    {
        $enseignants = Enseignant::findOrFail($enseignant);

        // Générez le contenu de la facture dans une vue
        $html = view('pages.enseignants.print', compact('enseignant'))->render();

        return view('pages.enseignants.show', compact('enseignant', 'html'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($enseignant)
    {
        // Récupérer les détails de l'élève à partir de l'ID
        $enseignant = Enseignant::findOrFail($enseignant);
        $caisses = Caisse::all();

        // Passer les détails de l'élève à la vue d'édition
        return view('pages.enseignants.edit', compact('enseignant', 'caisses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $enseignant)
    {
        $request->validate([
            'nom' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'codcais' => 'required',
        ]);
        $enseignant = Enseignant::findOrFail($enseignant);
        $enseignant->nom = $request->input('nom');
        $enseignant->postnom = $request->input('postnom');
        $enseignant->prenom = $request->input('prenom');
        $enseignant->sexe = $request->input('sexe');
        $enseignant->codcais = $request->input('codcais');
        $enseignant->save();
        // $enseignant->update($request->all());

        return redirect()->route('enseignants.index')->with('success', 'Enseignant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enseignant = Enseignant::findOrFail($id);

        $enseignant->delete();

        return redirect()->route('enseignants.index')->with('info', 'Enseignant(e) supprimé(e) avec succès.');
    }

    public function printEnseignants()
    {
        $enseignants = Enseignant::with('caisse')->get();

        return view('pages.enseignants.print', compact('enseignants'));
    }
}
