<?php

namespace App\Http\Controllers;

use App\Models\Type_document;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_documents = Type_document::all();

        return view('pages.type_documents.index', compact('type_documents'));
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
            'codtypedoc' => 'required',
            'libtypedoc' => 'required',
        ]);

        Type_document::create($request->all());

        return redirect()->route('type_documents.index')->with('success', 'Type doc créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type_document $type_document)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type_document)
    {
        $type_documents = Type_document::all();
        $type_document = Type_document::findOrFail($type_document);

        return view('pages.type_documents.indexedit', compact('type_document', 'type_documents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type_document)
    {
        $request->validate([
            'codtypedoc' => 'required',
            'libtypedoc' => 'required',
        ]);
        $type_document = Type_document::findOrFail($type_document);
        $type_document->codtypedoc = $request->input('codtypedoc');
        $type_document->libtypedoc = $request->input('libtypedoc');
        $type_document->save();
        // $type_document->update($request->all());

        return redirect()->route('type_documents.index')->with('success', 'Type de doc mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $type_document = Type_document::findOrFail($id);

        $type_document->delete();

        return redirect()->route('type_documents.index')->with('info', 'Type doc supprimé avec succès.');
    }
}
