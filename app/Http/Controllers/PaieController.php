<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Document;
use App\Models\Enseignant;
use App\Models\Paie;
use Illuminate\Http\Request;

class PaieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paies = Paie::with('enseignant', 'document')->get();
        $enseignants = Enseignant::all();
        $documents = Document::all();

        return view('pages.paies.index', compact('paies', 'enseignants', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paies = Paie::all();
        $directions = Direction::all();
        $enseignants = Enseignant::all();
        $documents = Document::all();

        return view('pages.paies.create', compact('paies', 'directions', 'documents', 'enseignants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mont' => 'required',
            'datpaie' => 'required',
            'coddir' => 'required',
            'nens' => 'required',
            'ndoc' => 'required',
        ]);

        Paie::create($request->all());

        return redirect()->route('paies.index')->with('success', 'Paiement effectué avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paie $paie)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($paie)
    {
        // Récupérer les détails de l'élève à partir de l'ID
        $paie = Paie::findOrFail($paie);
        $directions = Direction::all();
        $enseignants = Enseignant::all();

        // Passer les détails de l'élève à la vue d'édition
        return view('pages.paies.edit', compact('paie', 'directions', 'enseignants', 'documents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $paie)
    {
        $request->validate([
            'mont' => 'required',
            'datpaie' => 'required',
            'coddir' => 'required',
            'nens' => 'required',
            'ndoc' => 'required',
        ]);
        $paie = Paie::findOrFail($paie);
        $paie->mont = $request->input('mont');
        $paie->datpaie = $request->input('datpaie');
        $paie->coddir = $request->input('coddir');
        $paie->nens = $request->input('nens');
        $paie->ndoc = $request->input('ndoc');
        $paie->save();
        // $paie->update($request->all());

        return redirect()->route('paies.index')->with('success', 'Fiche de paie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paie = Paie::findOrFail($id);

        $paie->delete();

        return redirect()->route('paies.index')->with('info', 'Fiche de paie supprimée avec succès.');
    }

    public function print()
    {
        $paies = Paie::with('enseignant')->get();

        return view('pages.paies.print', compact('paies'));
    }
}
