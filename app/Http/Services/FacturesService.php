<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\Facture;
use App\Models\Chantier;
use App\Models\Client;

class FacturesService
{
    public static function create($id_client, $id_chantier, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage)
    {
        $facture = Facture::create([
            'id_client' => $id_client,
            'id_chantier' => $id_chantier,
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

    public static function update(Facture $facture, $id_client, $id_chantier, $numero_situation, $pv_numero, $date_facture, $sous_total, $montant_facture, $echeance, $affacturage)
    {
        $facture->update([
            'id_client' => $id_client,
            'id_chantier' => $id_chantier,
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
