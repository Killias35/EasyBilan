<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\Chantier;

class ChantiersService
{
    public static function create($id_client, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur)
    {
        $chantier = Chantier::create([
            'id_client' => $id_client,
            'nom_chantier' => $nom_chantier,
            'adresse_chantier' => $adresse_chantier,
            'code_postal_chantier' => $code_postal_chantier,
            'ville_chantier' => $ville_chantier,
            'conducteur' => $conducteur
        ]);
        return $chantier;
    }

    public static function update(Chantier $chantier, $id_client, $nom_chantier, $adresse_chantier, $code_postal_chantier, $ville_chantier, $conducteur)
    {
        $chantier->update([
            'id_client' => $id_client,
            'nom_chantier' => $nom_chantier,
            'adresse_chantier' => $adresse_chantier,
            'code_postal_chantier' => $code_postal_chantier,
            'ville_chantier' => $ville_chantier,
            'conducteur' => $conducteur
        ]);
        return $chantier;
    }

    public static function delete(Chantier $chantier)
    {
        $chantier->delete();
        return $chantier;
    }


}
