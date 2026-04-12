<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ExportService;
use App\Models\Devis;
use App\Models\Facture;
use PDF;

class ExportController extends Controller
{
    
    public function create(Request $request)
    {
        $devisId = $request->query('devis_id');
        $factureId = $request->query('facture_id');

        if (!$devisId) {
            $devisId = Devis::first()->id;
        }
        $devi = Devis::with('chantier', 'client', 'factures')->find($devisId);
        $devis = Devis::orderBy('id')->with('chantier', 'client', 'factures')->get();

        $factures = Facture::where('id_devis', $devisId)->orderBy('id')->get();
        if (!$factureId && $factures->count() > 0) {
            $facture = $factures->first();
        }
        else if ($factureId) {
            $facture = $factures->find($factureId);
        }
        else{
            $facture = null;
        }

        return view('pdf.devis.create', compact(
            'devi', 'devis', 
            'factures', 'facture'
        ));
    }

    public function downloadPdf(Request $request)
    {
        $id = $request->query('id');

        // Récupérer le devis
        $facture = Facture::find($id);
        $factures = Facture::orderBy('id')->get();

        // Générer le PDF à partir de la vue
        $pdf = PDF::loadView('pdf.partials.devis', compact("facture", "factures"));

        // Télécharger le PDF
        return $pdf->download('devis_'.$facture->id.'.pdf');
    }

}
