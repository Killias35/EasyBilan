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
            return redirect()->route('devis.create', [
                'facture_id' => $factureId
            ]);
        }
        $facture = Facture::with('client', 'chantier')->find($factureId);
        $factures = Facture::orderBy('id')->with('client', 'chantier')->get();
        if ($facture === null) {
            return redirect()->route('home');
        }
        return view('pdf.facture.devis', compact('facture', 'factures'));
    }

    public function upload(Request $request)
    {
        try {
            $request->validate([
                'devis_file' => 'required|mimes:pdf'
            ]);

            $data = DevisService::ReadPdf($request->file('devis_file'));
            $facture = Facture::with('client', 'chantier')->first();
            $text = DevisService::Replace($data['text'], $facture);
            $pdf = DevisService::GeneratePdfFromText($text);

            return $pdf->download('devis-modifie.pdf');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function downloadPdf(Request $request)
    {
        $id = $request->query('id');

        // Récupérer le devis
        $facture = Facture::with('client', 'chantier')->find($id);
        $factures = Facture::orderBy('id')->with('client', 'chantier')->get();

        // Générer le PDF à partir de la vue
        $pdf = PDF::loadView('pdf.partials.devis', compact('facture', 'factures'));

        // Télécharger le PDF
        return $pdf->download('devis_'.$facture->id.'.pdf');
    }

}
