<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Direction;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agent::all();

        return view('pages.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directions = Direction::all();

        return view('pages.agents.create', compact('directions'));
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

        Agent::create($request->all());

        return redirect()->route('agents.index')->with('success', 'Agent créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($agent)
    {
        // Récupérer les détails de l'élève à partir de l'ID
        $agent = Agent::findOrFail($agent);
        $directions = Direction::All();

        // Passer les détails de l'élève à la vue d'édition
        return view('pages.agents.edit', compact('directions', 'agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $agent)
    {
        $request->validate([
            'nom' => 'required',
            'postnom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'coddir' => 'required',
        ]);
        $agent = agent::findOrFail($agent);
        $agent->nom = $request->input('nom');
        $agent->postnom = $request->input('postnom');
        $agent->prenom = $request->input('prenom');
        $agent->sexe = $request->input('sexe');
        $agent->coddir = $request->input('coddir');
        $agent->save();

        // $agent->update($request->all());

        return redirect()->route('agents.index')->with('success', 'Agent mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);

        $agent->delete();

        return redirect()->route('agents.index')->with('info', 'Agent supprimé avec succès.');
    }

    public function printAgents()
    {
        $agents = Agent::with('direction')->get();

        return view('pages.agents.print', compact('agents'));
    }
}
