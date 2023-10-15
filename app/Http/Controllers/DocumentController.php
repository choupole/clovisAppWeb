<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Type_document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        $type_documents = Type_document::all();

        return view('pages.documents.index', compact('documents', 'type_documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_documents = Type_document::all();
        $documents = Document::all();

        return view('pages.documents.index', compact('type_documents', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libdoc' => 'required',
            'codtypedoc' => 'required',
            'datdoc' => 'required',
        ]);

        Document::create($request->all());

        return redirect()->route('documents.index')->with('success', 'Document créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($document)
    {
        $document = Document::findOrFail($document);
        $documents = Document::all();
        $type_documents = Type_document::all();

        return view('pages.documents.indexedit', compact('type_documents', 'document', 'documents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $document)
    {
        $request->validate([
            'libdoc' => 'required',
            'datdoc' => 'required',
        ]);
        $document = Document::findOrFail($document);
        $document->libdoc = $request->input('libdoc');
        $document->datdoc = $request->input('datdoc');
        $document->save();
        // $document->update($request->all());

        return redirect()->route('documents.index')->with('success', 'document mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($document)
    {
        $document = Document::findOrFail($document);

        $document->delete();

        return redirect()->route('documents.index')->with('info', 'Document supprimé avec succès.');
    }
}
