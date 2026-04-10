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

    public static function syncMateriaux(Devis $devis, array $materiaux)
    {
        foreach ($materiaux as $materiauId => $data) {

            // Nettoyage des valeurs
            $quantite = $data['quantite'] ?? 0;

            // priorité pivot > fallback null
            $prix = isset($data['prix']) && $data['prix'] !== ''
                ? $data['prix']
                : null;

            $tva = isset($data['tva']) && $data['tva'] !== ''
                ? $data['tva']
                : null;

            // sync sans écraser les autres relations
            $devis->materiaux()->syncWithoutDetaching([
                $materiauId => [
                    'quantite' => $quantite,
                    'prix' => $prix,
                    'tva' => $tva,
                ]
            ]);
        }
    }

    public static function detachMateriaux(Devis $devis, int $materiaux)
    {
        $devis->materiaux()->detach($materiaux);
    }
}
