<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();

        return view('pages.classes.index', compact('classes'));
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
        $validator = Validator::make($request->all(), [
            'codclas' => 'required|unique:classes',
            'libclas' => 'required',
        ]);

        $validator->setCustomMessages([
            'required' => 'Le champ :attribute est obligatoire.',
            'unique' => 'La valeur du champ code classe existe déjà.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Classe::create($request->all());

        Session::flash('success', 'Classe créée avec succès.');

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($classe)
    {
        $classes = Classe::all();
        $classe = Classe::findOrFail($classe);

        return view('pages.classes.indexedit', compact('classe', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $classe)
    {
        $request->validate([
            'codclas' => 'required',
            'libclas' => 'required',
        ]);
        $classe = classe::findOrFail($classe);
        $classe->codclas = $request->input('codclas');
        $classe->libclas = $request->input('libclas');
        $classe->save();
        // $classe->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Elève mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);

        $classe->delete();

        return redirect()->route('classes.index')->with('info', 'Classe supprimée avec succès.');
    }
}
