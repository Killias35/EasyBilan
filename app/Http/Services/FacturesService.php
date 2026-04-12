<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\Facture;
use App\Models\Devis;

class FacturesService
{
    public static function create($id_devis, $sous_devis, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage)
    {
        $facture = Facture::create([
            'id_devis' => $id_devis,
            'sous_devis' => $sous_devis,
            'numero_situation' => $numero_situation,
            'pv_numero' => $pv_numero,
            'date_facture' => $date_facture,
            'sous_total' => $sous_total,
            'montant_facture' => $montant_facture,
            'echeance' => $echeance,
            'affacturage' => $affacturage
        ]);

        return $facture;
    }

    public static function update(Facture $facture, $id_devis, $sous_devis, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage)
    {
        $facture->update([
            'id_devis' => $id_devis,
            'sous_devis' => $sous_devis,
            'numero_situation' => $numero_situation,
            'pv_numero' => $pv_numero,
            'date_facture' => $date_facture,
            'sous_total' => $sous_total,
            'montant_facture' => $montant_facture,
            'echeance' => $echeance,
            'affacturage' => $affacturage
        ]);

        return $facture;
    }

    public static function delete(Facture $facture)
    {
        $facture->delete();
        return $facture;
    }


}
