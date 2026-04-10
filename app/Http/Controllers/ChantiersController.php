<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ChantiersService;
use App\Models\Chantier;
use App\Models\Devis;

class ChantiersController extends Controller
{
    public function index()
    {
        $chantiers = Chantier::all();
        $devis = Devis::all();
        return view('chantiers.index', compact('chantiers', 'devis'));
    }

    public function create()
    {  
        $devis = Devis::all();
        return view('chantiers.create', compact('devis'));
    }

    public function store(Request $request)
    {
        $devis = Devis::all();
        $id_devis = $request->input('id_devis', null);
        $nom_chantier = $request->input('nom_chantier', null);
        $adresse_chantier = $request->input('adresse_chantier', null);
        $code_postal_chantier = $request->input('code_postal_chantier', null);
        $ville_chantier = $request->input('ville_chantier', null);
        $conducteur = $request->input('conducteur', null);

        try {
            $chantier = ChantiersService::create($id_devis, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur);
            return redirect()->route('chantiers.index', compact('devis'))->with('success', 'Le chantier a été créé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('chantiers.create', compact('devis'))->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $devis = Devis::all();
        $chantier = Chantier::find($id);
        return view('chantiers.edit', compact('chantier', 'devis'));
    }

    public function update(Request $request, $id)
    {
        $chantier = Chantier::find($id);
        $devis = Devis::all();

        $id_devis = $request->input('id_devis', null);
        $nom_chantier = $request->input('nom_chantier', null);
        $adresse_chantier = $request->input('adresse_chantier', null);
        $code_postal_chantier = $request->input('code_postal_chantier', null);
        $ville_chantier = $request->input('ville_chantier', null);
        $conducteur = $request->input('conducteur', null);

        try {
            $chantier = ChantiersService::update($chantier, $id_devis, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur);
            return redirect()->route('chantiers.index', compact('devis'))->with('success', 'Le chantier a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('chantiers.edit', compact('devis'), $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $chantier = Chantier::find($id);
        ChantiersService::delete($chantier);
        return redirect()->route('chantiers.index')->with('success', 'Le chantier a été supprimé avec succès');
    }

}
