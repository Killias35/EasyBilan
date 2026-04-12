<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\FacturesService;

use App\Models\Devis;
use App\Models\Facture;

class FacturesController extends Controller
{
    public function index()
    {
        $factures = Facture::all();
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $devis = Devis::all();
        return view('factures.create', compact('devis'));
    }

    public function store(Request $request)
    {
        $devis = Devis::all();

        $id_devis = $request->input('id_devis', null);
        $sous_devis = $request->input('sous_devis', null);
        $numero_situation = $request->input('numero_situation', null);
        $pv_numero = $request->input('pv_numero', null);
        $date_facture = $request->input('date_facture', null);
        $sous_total = $request->input('sous_total', null);
        $montant_facture = $request->input('montant_facture', null);
        $echeance = $request->input('echeance', null);
        $affacturage = $request->input('affacturage', null);

        try {
            $facture = FacturesService::create($id_devis, $sous_devis, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage);
            return redirect()->route('factures.index', compact('devis'))->with('success', 'La facture a été créée avec succès');
        } catch (\Exception $e) {
            return redirect()->route('factures.create', compact('devis'))->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $facture = Facture::find($id);
        $devis = Devis::all();
        return view('factures.edit', compact('facture', 'devis'));
    }

    public function update(Request $request, $id)
    {
        $facture = Facture::find($id);
        $devis = Devis::all();

        $id_devis = $request->input('id_devis', null);
        $sous_devis = $request->input('sous_devis', null);
        $numero_situation = $request->input('numero_situation', null);
        $pv_numero = $request->input('pv_numero', null);
        $date_facture = $request->input('date_facture', null);
        $sous_total = $request->input('sous_total', null);
        $montant_facture = $request->input('montant_facture', null);
        $echeance = $request->input('echeance', null);
        $affacturage = $request->input('affacturage', null);
        try {
            $facture = FacturesService::update($facture, $id_devis, $sous_devis, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage);
            return redirect()->route('factures.index', compact('devis'))->with('success', 'La facture a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('factures.edit', compact('devis'), $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $facture = Facture::find($id);
        FacturesService::delete($facture);
        return redirect()->route('factures.index')->with('success', 'La facture a été supprimée avec succès');
    }
}
