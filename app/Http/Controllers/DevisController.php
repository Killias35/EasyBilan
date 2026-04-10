<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\DevisService;
use App\Models\Devis;
use App\Models\Client;
use PDF;

class DevisController extends Controller
{
    
    public function index()
    {
        $devis = Devis::all();
        $clients = Client::all();
        return view('devis.index', compact('devis', 'clients'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('devis.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $id_client = $request->input('id_client', null);
        $date_devis = $request->input('date_devis', null);
        $duree_validite = $request->input('duree_validite', null);

        try {
            $devis = DevisService::create($id_client, $date_devis, $duree_validite);
            return redirect()->route('devis.index')->with('success', 'Le devis a été créé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('devis.create')->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $devis = Devis::find($id);
        $clients = Client::all();
        return view('devis.edit', compact('devis', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $devis = Devis::find($id);

        $date_devis = $request->input('date_devis', null);
        $duree_validite = $request->input('duree_validite', null);

        try {
            $devis = DevisService::update($devis, $date_devis, $duree_validite);
            return redirect()->route('devis.index')->with('success', 'Le devis a été mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->route('devis.edit', $id)->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request, $id)
    {
        $devis = Devis::find($id);
        DevisService::delete($devis);
        return redirect()->route('devis.index')->with('success', 'Le devis a été supprimé avec succès');
    }
}
