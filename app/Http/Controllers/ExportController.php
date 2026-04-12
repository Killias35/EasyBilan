<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ExportService;
use App\Models\Facture;
use PDF;

class ExportController extends Controller
{
    
    public function create(Request $request)
    {
        $factureId = $request->query('facture_id');

        // Si absent → redirection avec paramètre
        if (!$factureId) {
            $factureId = Facture::first()->id;
        }
        $facture = Facture::with('devis')->find($factureId);
        $factures = Facture::orderBy('id')->with('devis')->get();

        return view('pdf.facture.devis', compact('facture', 'factures'));
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
