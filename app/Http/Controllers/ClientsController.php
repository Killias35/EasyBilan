<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

use App\Http\Services\ClientsService;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $civilite = $request->input('civilite', null);
        $nom_client = $request->input('nom_client', null);
        $adresse_client = $request->input('adresse_client', null);
        $code_postal_client = $request->input('code_postal_client', null);
        $ville_client = $request->input('ville_client', null);
        $tel = $request->input('tel', null);
        $tva_intra = $request->input('tva_intra', null);
        $rcs = $request->input('rcs', null);

        try {
            $client = ClientsService::create($civilite, $nom_client, $adresse_client, $code_postal_client, $ville_client, $tel, $tva_intra, $rcs);
            return redirect()->route('clients.index')->with('success', 'Le client a été créé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('clients.create')->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        $civilite = $request->input('civilite', null);
        $nom_client = $request->input('nom_client', null);
        $adresse_client = $request->input('adresse_client', null);
        $code_postal_client = $request->input('code_postal_client', null);
        $ville_client = $request->input('ville_client', null);
        $tel = $request->input('tel', null);
        $tva_intra = $request->input('tva_intra', null);
        $rcs = $request->input('rcs', null);

        try {
            $client = ClientsService::update($client, $civilite, $nom_client, $adresse_client, $code_postal_client, $ville_client, $tel, $tva_intra, $rcs);
            return redirect()->route('clients.index')->with('success', 'Le client a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('clients.edit', $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $client = Client::find($id);
        ClientsService::delete($client);
        return redirect()->route('clients.index')->with('success', 'Le client a été supprimé avec succès');
    }
}
