<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\Facture;
use App\Models\Reglement;

class ReglementsService
{
    public static function create($id_facture, $date_reglement, $montant_regle)
    {
        $reglement = Reglement::create([
            'id_facture' => $id_facture,
            'date_reglement' => $date_reglement,
            'montant_regle' => $montant_regle  
        ]);

        return $reglement;
    }

    public static function update($reglement, $id_facture, $date_reglement, $montant_regle)
    {
        $reglement->update([
            'id_facture' => $id_facture,
            'date_reglement' => $date_reglement,
            'montant_regle' => $montant_regle  
        ]);

        return $reglement;
    }

    public static function delete(Reglement $reglement)
    {
        $reglement->delete();
        return $reglement;
    }


}
