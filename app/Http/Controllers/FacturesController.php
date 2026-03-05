<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\FacturesService;

use App\Models\Chantier;
use App\Models\Client;
use App\Models\Facture;

class FacturesController extends Controller
{
    public function index()
    {
        $factures = Facture::all();
        $clients = Client::all();
        $chantiers = Chantier::all();
        return view('factures.index', compact('factures', 'clients', 'chantiers'));
    }

    public function create()
    {
        $clients = Client::all();
        $chantiers = Chantier::all();
        return view('factures.create', compact('clients', 'chantiers'));
    }

    public function store(Request $request)
    {
        $clients = Client::all();
        $chantiers = Chantier::all();

        $id_client = $request->input('id_client', null);
        $id_chantier = $request->input('id_chantier', null);
        $numero_situation = $request->input('numero_situation', null);
        $pv_numero = $request->input('pv_numero', null);
        $date_facture = $request->input('date_facture', null);
        $sous_total = $request->input('sous_total', null);
        $montant_facture = $request->input('montant_facture', null);
        $echeance = $request->input('echeance', null);
        $affacturage = $request->input('affacturage', null);

        try {
            $facture = FacturesService::create($id_client, $id_chantier, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage);
            return redirect()->route('factures.index', compact('clients', 'chantiers'))->with('success', 'La facture a été créée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('factures.create', compact('clients', 'chantiers'))->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $facture = Facture::find($id);
        $clients = Client::all();
        $chantiers = Chantier::all();
        return view('factures.edit', compact('facture', 'clients', 'chantiers'));
    }

    public function update(Request $request, $id)
    {
        $facture = Facture::find($id);
        $clients = Client::all();
        $chantiers = Chantier::all();

        $id_client = $request->input('id_client', null);
        $id_chantier = $request->input('id_chantier', null);
        $numero_situation = $request->input('numero_situation', null);
        $pv_numero = $request->input('pv_numero', null);
        $date_facture = $request->input('date_facture', null);
        $sous_total = $request->input('sous_total', null);
        $montant_facture = $request->input('montant_facture', null);
        $echeance = $request->input('echeance', null);
        $affacturage = $request->input('affacturage', null);

        try {
            $facture = FacturesService::update($facture, $id_client, $id_chantier, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage);
            return redirect()->route('factures.index', compact('clients', 'chantiers'))->with('success', 'La facture a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('factures.edit', compact('clients', 'chantiers'), $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $facture = Facture::find($id);
        FacturesService::delete($facture);
        return redirect()->route('factures.index')->with('success', 'La facture a été supprimée avec succès');
    }
}
