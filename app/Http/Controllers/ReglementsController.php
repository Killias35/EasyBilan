<?php

namespace App\Http\Controllers;

use App\Http\Services\ReglementsService;

use Illuminate\Http\Request;
use App\Models\Reglement;
use App\Models\Facture;

class ReglementsController extends Controller
{
    public function index()
    {
        $reglements = Reglement::all();
        return view('reglements.index', compact('reglements'));
    }

    public function create()
    {
        $factures = Facture::all();
        return view('reglements.create', compact('factures'));
    }

    public function store(Request $request)
    {
        $id_facture = $request->input('id_facture', null);
        $date_reglement = $request->input('date_reglement', null);
        $montant_regle = $request->input('montant_regle', null);
        $reglement = ReglementsService::create($id_facture, $date_reglement, $montant_regle);
        return redirect()->route('reglements.index')->with('success', 'Le reglement a été créé avec succès');
    }

    public function edit(Reglement $reglement)
    {
        $factures = Facture::all();
        return view('reglements.edit', compact('reglement', 'factures'));
    }

    public function update(Request $request, $id)
    {
        $reglement = Reglement::find($id);
        $id_facture = $request->input('id_facture', null);
        $date_reglement = $request->input('date_reglement', null);
        $montant_regle = $request->input('montant_regle', null);
        $reglement = ReglementsService::update($reglement, $id_facture, $date_reglement, $montant_regle);
        return redirect()->route('reglements.index')->with('success', 'Le reglement a été mis à jour avec succès');
    }

    public function destroy(Reglement $reglement)
    {
        ReglementsService::delete($reglement);
        return redirect()->route('reglements.index')->with('success', 'Le reglement a été supprimé avec succès');
    }
}
