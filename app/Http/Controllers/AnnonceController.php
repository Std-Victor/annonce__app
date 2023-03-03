<?php

namespace App\Http\Controllers;

use App\Models\annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('annonces.index', ['annonces' => annonce::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annonces.create', ['type_list' => annonce::$type_list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'titre' => 'required|string',
        'description' => 'required|string',
        'type' => 'required',
        'ville' => 'required|string',
        'superficie' => 'required|integer',
        'prix' => 'required|decimal:0,2',
      ]);

      annonce::create([...$request->all(),  'neuf' => $request->neuf ?? 0]);
      return redirect()->route('annonces.index')->with('message', 'L\'annonce a été mis à jour avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(annonce $annonce)
    {
        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(annonce $annonce)
    {
        return view('annonces.edit', ['annonce' => $annonce, 'type_list' => annonce::$type_list]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, annonce $annonce)
    {
      $request->validate([
        'titre' => 'required|string',
        'description' => 'required|string',
        'type' => 'required',
        'ville' => 'required|string',
        'superficie' => 'required|integer',
        'prix' => 'required|decimal:0,2',
      ]);

        $annonce->update([...$request->all(),  'neuf' => $request->neuf ?? 0]);
        return redirect()->route('annonces.index')->with('message', 'L\'annonce a été mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(annonce $annonce)
    {
        $annonce->delete();
        return redirect()->route('annonces.index')->with('message', 'L\'annonce a été supprimé avec succès');
    }
}
