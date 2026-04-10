<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\MateriauxService;
use App\Models\Materiel;

class MateriauxController extends Controller
{
    public function index()
    {
        $materiaux = Materiel::all();
        return view('materiaux.index', compact('materiaux'));
    }

    public function create()
    {  
        return view('materiaux.create');
    }

    public function store(Request $request)
    {
        $nom = $request->input('nom', null);
        $description = $request->input('description', null);
        $prix = $request->input('prix', null);
        $tva = $request->input('tva', null);
        
        try {
            $materiel = MateriauxService::create($nom, $description, $prix, $tva);
            return redirect()->route('materiaux.index')->with('success', 'Le materiel a été créé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('materiaux.create')->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $materiel = Materiel::find($id);
        return view('materiaux.edit', compact('materiel'));
    }

    public function update(Request $request, $id)
    {
        $materiel = Materiel::find($id);
        $nom = $request->input('nom', null);
        $description = $request->input('description', null);
        $prix = $request->input('prix', null);
        $tva = $request->input('tva', null);
        
        try {
            $materiel = MateriauxService::update($materiel, $nom, $description, $prix, $tva);
            return redirect()->route('materiaux.index')->with('success', 'Le materiel a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('materiaux.edit', $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $materiel = Materiel::find($id);
        MateriauxService::delete($materiel);
        return redirect()->route('materiaux.index')->with('success', 'Le materiel a été supprimé avec succès');
    }

}
