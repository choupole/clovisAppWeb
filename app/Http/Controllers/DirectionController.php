<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();

        return view('pages.directions.index', compact('directions'));
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
            'coddir' => 'required|unique:directions',
            'libdir' => 'required',
        ]);

        $validator->setCustomMessages([
            'required' => 'Le champ :attribute est obligatoire.',
            'unique' => 'La valeur du champ code direction existe déjà.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        direction::create($request->all());

        Session::flash('success', 'direction créée avec succès.');

        return redirect()->route('directions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Direction $direction)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($direction)
    {
        $direction = Direction::findOrFail($direction);
        $directions = Direction::all();

        return view('pages.directions.indexedit', compact('directions', 'direction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $direction)
    {
        $request->validate([
            'coddir' => 'required',
            'libdir' => 'required',
        ]);
        $direction = Direction::findOrFail($direction);
        $direction->coddir = $request->input('coddir');
        $direction->libdir = $request->input('libdir');
        $direction->save();
        // $direction->update($request->all());

        return redirect()->route('directions.index')->with('success', 'direction mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($direction)
    {
        $direction = direction::findOrFail($direction);

        $direction->delete();

        return redirect()->route('directions.index')->with('info', 'direction supprimée avec succès.');
    }
}
