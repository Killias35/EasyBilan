<?php

namespace App\Http\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

use App\Models\Devis;
use App\Models\Chantier;
use App\Models\Facture;
use App\Models\Reglement;

use Smalot\PdfParser\Parser;
use Illuminate\Http\UploadedFile;
use Barryvdh\DomPDF\Facade\Pdf;

class DevisService
{
    public static function create($id_client, $date_devis, $duree_validite)
    {
        $devis = Devis::create([
            'id_client' => $id_client,
            'date_devis' => $date_devis,
            'duree_validite' => $duree_validite
        ]);
        return $devis;
    }

    public static function update(Devis $devis, $date_devis, $duree_validite)
    {
        $devis->update([
            'date_devis' => $date_devis,
            'duree_validite' => $duree_validite
        ]);
        return $devis;
    }

    public static function delete(Devis $devis)
    {
        $devis->delete();
        return $devis;
    }

}
