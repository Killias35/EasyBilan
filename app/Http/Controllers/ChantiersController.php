<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ChantiersService;
use App\Models\Chantier;
use App\Models\Client;

class ChantiersController extends Controller
{
    public function index()
    {
        $chantiers = Chantier::all();
        $clients = Client::all();
        return view('chantiers.index', compact('chantiers', 'clients'));
    }

    public function create()
    {  
        $clients = Client::all();
        return view('chantiers.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $clients = Client::all();
        $id_client = $request->input('id_client', null);
        $nom_chantier = $request->input('nom_chantier', null);
        $adresse_chantier = $request->input('adresse_chantier', null);
        $code_postal_chantier = $request->input('code_postal_chantier', null);
        $ville_chantier = $request->input('ville_chantier', null);
        $conducteur = $request->input('conducteur', null);

        try {
            $chantier = ChantiersService::create($id_client, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur);
            return redirect()->route('chantiers.index', compact('clients'))->with('success', 'Le chantier a été créé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('chantiers.create', compact('clients'))->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $clients = Client::all();
        $chantier = Chantier::find($id);
        return view('chantiers.edit', compact('chantier', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $chantier = Chantier::find($id);
        $clients = Client::all();

        $id_client = $request->input('id_client', null);
        $nom_chantier = $request->input('nom_chantier', null);
        $adresse_chantier = $request->input('adresse_chantier', null);
        $code_postal_chantier = $request->input('code_postal_chantier', null);
        $ville_chantier = $request->input('ville_chantier', null);
        $conducteur = $request->input('conducteur', null);

        try {
            $chantier = ChantiersService::update($chantier, $id_client, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur);
            return redirect()->route('chantiers.index', compact('clients'))->with('success', 'Le chantier a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('chantiers.edit', compact('clients'), $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $chantier = Chantier::find($id);
        ChantiersService::delete($chantier);
        return redirect()->route('chantiers.index')->with('success', 'Le chantier a été supprimé avec succès');
    }

}
